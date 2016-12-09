<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="online-detail">

		<div class="date-age">
			<?if(isset($arResult["DISPLAY_PROPERTIES"]["date"])):?>
				<div class="online-date">
					<span>Дата:</span>
					<?
					$date = ParseDateTime($arResult["DISPLAY_PROPERTIES"]["date"]["DISPLAY_VALUE"], FORMAT_DATETIME);
					$date = $date["DD"]." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S"));
					echo $date;
					?>
					<span style="margin-left: 25px;">Время:</span>
					<?
					echo ConvertDateTime($arResult["DISPLAY_PROPERTIES"]["date"]["DISPLAY_VALUE"],"HH:MI");
					?>
				</div>
			<?endif;?>

			<?if(isset($arResult["DISPLAY_PROPERTIES"]["age"])):?>
				<div class="online-age">
					<?=$arResult["DISPLAY_PROPERTIES"]["age"]["DISPLAY_VALUE"]?>
				</div>
			<?endif;?>
		</div>

		<?if(isset($arResult["DISPLAY_PROPERTIES"]["youtube"])):?>
			<?=$arResult["DISPLAY_PROPERTIES"]["youtube"]["~VALUE"]?>
		<?endif;?>


		<?if($arResult["PREVIEW_TEXT"]!=""):?>
			<div class="preview-text">
				<?=$arResult["PREVIEW_TEXT"]?>
			</div>
		<?endif;?>


	
	<?
	if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>
</div>