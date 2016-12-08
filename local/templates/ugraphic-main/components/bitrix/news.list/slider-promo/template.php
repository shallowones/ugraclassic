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
<div id="slider-promo">
	<a href="<?=$arResult["ITEMS"][0]["~DETAIL_PAGE_URL"];?>" alt="<?=$arResult["ITEMS"][0]["NAME"]?>" title="<?=$arResult["ITEMS"][0]["NAME"]?>">
		<div class="item">

		<div class="slider-info">
				
				<div class="info-box">
					<div class="date">
						<?if($arResult["ITEMS"][0]["DISPLAY_ACTIVE_FROM"]):?>
						<?
									$date = ParseDateTime($arResult["ITEMS"][0]["DISPLAY_ACTIVE_FROM"], FORMAT_DATETIME);
									$date2 = $date["DD"]." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S"));

									echo $date2;?><?
									$time = ConvertDateTime($arResult["ITEMS"][0]["DISPLAY_ACTIVE_FROM"],"HH:MI");
									if ($time!="00:00") {
										echo ", ";
										echo $time;
									}
						?>
						<?endif;?>
					</div>

					<div class="name">
						<?=$arResult["ITEMS"][0]['NAME']?>
					</div>
				</div>

				<div class="age">
					<?=$arResult["ITEMS"][0]['DISPLAY_PROPERTIES']['age']['DISPLAY_VALUE']?>
				</div>
                <? if(strlen(trim($arResult["ITEMS"][0]['DISPLAY_PROPERTIES']['link_kassir']['VALUE'])) > 0): ?>
                    <a href="<?=$arResult["ITEMS"][0]['DISPLAY_PROPERTIES']['link_kassir']['VALUE']?>" class="no-link"><div class="buy-ticket">Купить билет</div></a>
                <? endif; ?>

		</div>

		<div class="mask-1"></div>
			<img 	class="img-box"  
					src="<?=$arResult["ITEMS"][0]["PREVIEW_PICTURE"]["SRC"]?>"
					alt="<?=$arResult["ITEMS"][0]["NAME"]?>"
					title="<?=$arResult["ITEMS"][0]["NAME"]?>"
					 />			
		</div>
	</a>
</div>



<div class="promo-right-col">	
		<?$mini_img = CFile::ResizeImageGet($arResult["ITEMS"][1]["PREVIEW_PICTURE"], array('width'=>440, 'height'=>280), BX_RESIZE_IMAGE_EXACT, true); ?>
		<div class="promo-right-item">	

			<div class="slider-info">
				
				<div class="info-box">
					<div class="date">
						<?if($arResult["ITEMS"][1]["DISPLAY_ACTIVE_FROM"]):?>
						<?
									$date = ParseDateTime($arResult["ITEMS"][1]["DISPLAY_ACTIVE_FROM"], FORMAT_DATETIME);
									$date2 = $date["DD"]." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S"));

									echo $date2;
						?>

						<?
									$time = ConvertDateTime($arResult["ITEMS"][1]["DISPLAY_ACTIVE_FROM"],"HH:MI");
									if ($time!="00:00") {
										echo $time;
									}
						?>
						<?endif;?>
					</div>

					<div class="name">
						<?=$arResult["ITEMS"][1]['NAME']?>
					</div>

				</div>

					<div class="age">
						<?=$arResult["ITEMS"][1]['DISPLAY_PROPERTIES']['age']['DISPLAY_VALUE']?>
					</div>
			</div>

		

		<div class="mask-2-3"></div>

					<img 	class="img-right"  
							src="<?=$mini_img["src"]?>"
							width="<?=$mini_img["width"]?>"
							height="<?=$mini_img["height"]?>"
							alt="<?=$arResult["ITEMS"][1]["NAME"]?>"
							title="<?=$arResult["ITEMS"][1]["NAME"]?>"
					 />

		</div>

		
<?$mini_img = CFile::ResizeImageGet($arResult["ITEMS"][2]["PREVIEW_PICTURE"], array('width'=>310, 'height'=>201), BX_RESIZE_IMAGE_EXACT, true); ?>
		<div class="promo-right-item">	

			<div class="slider-info">
				
				<div class="info-box">
					<div class="date">
						<?if($arResult["ITEMS"][2]["DISPLAY_ACTIVE_FROM"]):?>
						<?
									$date = ParseDateTime($arResult["ITEMS"][2]["DISPLAY_ACTIVE_FROM"], FORMAT_DATETIME);
									$date2 = $date["DD"]." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S"));

									echo $date2;
						?>

						<?
									$time = ConvertDateTime($arResult["ITEMS"][2]["DISPLAY_ACTIVE_FROM"],"HH:MI");
									if ($time!="00:00") {
										echo $time;
									}
						?>
						<?endif;?>
					</div>

					<div class="name">
						<?=$arResult["ITEMS"][2]['NAME']?>
					</div>

				</div>

					<div class="age">
						<?=$arResult["ITEMS"][2]['DISPLAY_PROPERTIES']['age']['DISPLAY_VALUE']?>
					</div>
			</div>

		

		<div class="mask-2-3"></div>

					<img 	class="img-right"  
							src="<?=$mini_img["src"]?>"
							width="<?=$mini_img["width"]?>"
							height="<?=$mini_img["height"]?>"
							alt="<?=$arResult["ITEMS"][2]["NAME"]?>"
							title="<?=$arResult["ITEMS"][2]["NAME"]?>"
					 />

		</div>
		


</div><!-- .promo-right-col -->