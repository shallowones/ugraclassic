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
<? if(count($arResult["ITEMS"]) > 0): ?>
<div class="events-block"> <!-- events-block -->
    <div class="wrapper">

        <h1>МЕРОПРИЯТИЯ</h1>
<div class="events-slider-region">
	<div id="owl-events-slider2" class="owl-carousel owl-theme">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>

			<? $foto = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>700, 'height'=>360), BX_RESIZE_IMAGE_EXACT, true);?>
			
			<div class="columns">
				<div class="item" class="owl-carousel owl-theme" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

					<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
								<img class="preview_picture" border="0"
									src="<?=$foto["src"]?>"
									
									alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
									title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
								/>
							</a>
					<?endif?>

					<div class="events-info">
						<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
							
							<div class="events-name">
								<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
									<?echo $arItem["NAME"]?>
								</a>
							</div>
						<?endif;?>

						<?if(is_array($arItem["DISPLAY_PROPERTIES"]["date"])):?>
							<div class="events-slider-date">
								<?
								$date = ParseDateTime($arItem["DISPLAY_PROPERTIES"]["date"]["DISPLAY_VALUE"], FORMAT_DATETIME);
								$date = $date["DD"]." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S"));
								echo $date;
								echo ", ";
								echo ConvertDateTime($arItem["DISPLAY_PROPERTIES"]["date"]["DISPLAY_VALUE"],"HH:MI");
							?>
							</div>
						<?endif;?>

						<?if(is_array($arItem["DISPLAY_PROPERTIES"]["hall"])):?>
							<div class="events-hall-block">
							<div class="events-hall">
								<?=$arItem["DISPLAY_PROPERTIES"]["hall"]["DISPLAY_VALUE"]?>
							</div>
							</div>
						<?endif;?>


						<?if(is_array($arItem["DISPLAY_PROPERTIES"]["age"])):?>
							<div class="events-age">
								<?=$arItem["DISPLAY_PROPERTIES"]["age"]["DISPLAY_VALUE"]?>
							</div>
						<?endif;?>

					</div>

				</div>
			</div>
		<?endforeach;?>
		
	</div>

	<a href="<?=$arParams["LINK_TO_NEWS"]?>" class="no-link"><div class="all-news">Все мероприятия</div><a>

</div>
    </div><!-- .wrapper -->
</div><!-- .events-block -->



<script>
	function setEqualHeight(columns){
		var tallestcolumn = 0;
		columns.each(function(){
			currentHeight = $(this).height();
			if(currentHeight > tallestcolumn){
				tallestcolumn = currentHeight;
			}
			console.log($(this));
		});
		columns.height(tallestcolumn);
	}

	var owl = $('#owl-events-slider2');
	owl.owlCarousel({
		//loop : true,
		dots : false,
		margin : 5,

		autoplay : false, 
		autoplayTimeout : 15000, 
		autoplayHoverPause : true,
		smartSpeed : 500,
		navText : ["<i></i>","<i></i>"],
		responsive:{
			0:{
				items:1,
				mouseDrag : true,
			},
			758:{
				items:2,
				mouseDrag : true,
			},
			1000:{
				items:3,
				mouseDrag : false,
			},
			1400:{
				items:4,
				mouseDrag : false,
			}
		},
		onInitialized: setEqualHeight($("owl-events-slider2 div.owl-item > div"))
	});
</script>
<? endif; ?>