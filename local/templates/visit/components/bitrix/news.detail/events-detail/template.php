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
			<? $detail_img = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>700, 'height'=>600), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
			<img
				border="0"
				src="<?=$detail_img["src"]?>"
				width="310"
				alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
				title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
				class="preview-picture"
				/>
		<?else:?>
			<? $detail_img = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], array('width'=>700, 'height'=>600), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
			<img
				border="0"
				src="<?=$detail_img["src"]?>"
				width="310"
				alt="<?=$arResult["PREVIEW_PICTURE"]["ALT"]?>"
				title="<?=$arResult["PREVIEW_PICTURE"]["TITLE"]?>"
				class="preview-picture"
				/>
		<?endif?>

	<div class="afisha-info-box" style="float:left;">
		<div class="afisha-info">
			<div class="info-1">
					
					<div class="afisha-date">
						<span>Дата мероприятия:</span><?
						if ($_GET['archive'] == 'Y') {
							$date = ParseDateTime($arResult["ACTIVE_TO"], FORMAT_DATETIME);
						}else{
							$date = ParseDateTime($arResult["ACTIVE_FROM"], FORMAT_DATETIME);

						}
						$date1 = $date["DD"]." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S"));
						if (strlen($date["YYYY"])==4){
								$date2 =$date["YYYY"];
							}
							else{
								$date2 = substr($date["YYYY"],0,-1);
							}
						$date = $date1." ".$date2;
						echo $date;
						?>
					</div>

					

					<?
					$time = ConvertDateTime($arResult["DISPLAY_PROPERTIES"]["date"]["DISPLAY_VALUE"],"HH:MI");
						if ($time!="00:00") {

							echo "<div class='afisha-date'>";
							echo "<span>Время мероприятия:</span>";
							echo $time;
							echo "</div>";

						}
					?>

					<div class="afisha-date">
						<span>Место проведения:</span>
                        <? echo $arResult['PROPERTIES']['municipality']['VALUE']; ?>
                        <? if ($arResult['PROPERTIES']['locality']['VALUE']):
                            echo ', ' . $arResult['PROPERTIES']['locality']['VALUE'];
                        endif; ?>
                        <? if ($arResult['DISPLAY_PROPERTIES']['hall']['VALUE']):
                            echo ', ' . $arResult['DISPLAY_PROPERTIES']['hall']['VALUE'];
                        endif; ?>
					</div>

				<?if(isset($arResult["DISPLAY_PROPERTIES"]["duration"])):?>
					<div class="afisha-date">
						<span>Продолжительность:</span><?=$arResult["DISPLAY_PROPERTIES"]["duration"]["DISPLAY_VALUE"]?> минут
					</div>
				<?endif;?>

				<?if(isset($arResult["DISPLAY_PROPERTIES"]["cost"])):?>
					<div class="afisha-date">
						<span>Цена билета:</span><?=$arResult["DISPLAY_PROPERTIES"]["cost"]["DISPLAY_VALUE"]?> руб.
					</div>
				<?endif;?>


				<?if(isset($arResult["DISPLAY_PROPERTIES"]["info"])):?>
					<div class="afisha-date">
					<span>Информация и бронирование:</span><?=$arResult["DISPLAY_PROPERTIES"]["info"]["DISPLAY_VALUE"]?>
					</div>
				<?endif;?>
			</div>


			<?if(isset($arResult["DISPLAY_PROPERTIES"]["age"])):?>
			<div class="afisha-date">
					<span>Ограничения по возрасту:</span>
						<span class="afisha-age">
							<?=$arResult["DISPLAY_PROPERTIES"]["age"]["DISPLAY_VALUE"]?>
						</span>
			</div>
			<?endif;?>
			<div class="clrb"></div>

		</div>

	<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
			<div class="detail-text">
				<?echo $arResult["DETAIL_TEXT"];?>
			</div>
		<?endif?>

	</div>

<div class="clrb"></div>


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
