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
<div class="afisha-detail">

		<?if($arResult["DETAIL_PICTURE"]!=""):?>
			<? $detail_img = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>305, 'height'=>430), BX_RESIZE_IMAGE_PROPORTIONAL_EXT, true);?>
			<img
				border="0"
				src="<?=$detail_img["src"]?>"
				width="<?=$detail_img["width"]?>"
				height="<?=$detail_img["height"]?>"
				alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
				title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
				class="preview-picture"
				/>
		<?else:?>
			<? $detail_img = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], array('width'=>305, 'height'=>430), BX_RESIZE_IMAGE_PROPORTIONAL_EXT, true);?>
			<img
				border="0"
				src="<?=$detail_img["src"]?>"
				width="<?=$detail_img["width"]?>"
				height="<?=$detail_img["height"]?>"
				alt="<?=$arResult["PREVIEW_PICTURE"]["ALT"]?>"
				title="<?=$arResult["PREVIEW_PICTURE"]["TITLE"]?>"
				class="preview-picture"
				/>
		<?endif?>
	<div class="afisha-info">
		<div class="info-1">
			<?if(isset($arResult["ACTIVE_FROM"])):?>
				<div class="afisha-date">
					<span>Дата: </span>
					<?
					$date = ParseDateTime($arResult["ACTIVE_FROM"], FORMAT_DATETIME);
					$date = $date["DD"]." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S"));
					echo $date;
					?><br/>
					<span>Время:</span>
					<?
					echo ConvertDateTime($arResult["ACTIVE_FROM"],"HH:MI");
					?>
				</div>
			<?endif;?>


			<?if(isset($arResult["DISPLAY_PROPERTIES"]["hall"])):?>
				<div class="afisha-date">
					<span>Место:</span> <?=$arResult["DISPLAY_PROPERTIES"]["hall"]["DISPLAY_VALUE"]?>
				</div>
			<?endif;?>

		</div>
		
		<div class="info-2">
			<?if(isset($arResult["DISPLAY_PROPERTIES"]["duration"])):?>
				<div class="afisha-date">
					<span>Продолжительность:</span> <?=$arResult["DISPLAY_PROPERTIES"]["duration"]["DISPLAY_VALUE"]?> минут
				</div>
			<?endif;?>

			<?if(isset($arResult["DISPLAY_PROPERTIES"]["cost"])):?>
				<div class="afisha-date">
					<span>Цена билета:</span> <?=$arResult["DISPLAY_PROPERTIES"]["cost"]["DISPLAY_VALUE"]?> руб.
				</div>
			<?endif;?>
		</div>


		<div class="tickets-info">

			<?if(isset($arResult["DISPLAY_PROPERTIES"]["age"])):?>
				<div class="afisha-age">
					<?=$arResult["DISPLAY_PROPERTIES"]["age"]["DISPLAY_VALUE"]?>
				</div>
			<?endif;?>
			<div class="clrb"></div>
		</div>

	</div>

<div class="clrb"></div>

	<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
		<div class="detail-text">
			<?echo $arResult["DETAIL_TEXT"];?>
		</div>
	<?endif?>

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
