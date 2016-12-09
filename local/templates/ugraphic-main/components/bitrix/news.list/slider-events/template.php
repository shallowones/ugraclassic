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

<div class="events-block">
	<div class="wrapper">
		<h1>МЕРОПРИЯТИЯ</h1>
<div class="events-slider">
	<div id="owl-events-slider" class="owl-carousel owl-theme">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>

			<?
            $foto = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>306, 'height'=>185), BX_RESIZE_IMAGE_EXACT, true);
            if(!isset($foto["src"]))
            {
                $foto["src"] = SITE_TEMPLATE_PATH . '/img/no-photo-afishe.png';
            }
            ?>
			
			<div class="columns">
			<div class="item" class="owl-carousel owl-theme" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

				<?if($arParams["DISPLAY_PICTURE"]!="N" && isset($foto["src"])):?>
					<div class="photo">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
							<img class="preview_picture" border="0"
								src="<?=$foto["src"]?>"
								width="<?=$foto["width"]?>"
								height="<?=$foto["height"]?>"
								alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
								title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
							/>
						</a>
					</div>
				<?endif?>

				<div class="events-info">
                    <div class="events-slider-date">
                        <? if(is_array($arItem["DISPLAY_PROPERTIES"]["date_text"])): ?>
                            <?=$arItem["DISPLAY_PROPERTIES"]["date_text"]["DISPLAY_VALUE"]?>
                        <? elseif($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]): ?>
                            <? $arDate = explode(' ', $arItem["DISPLAY_ACTIVE_FROM"]); ?>
                            <?echo $arDate[0].' '.$arDate[1]?>
                        <? endif; ?>
                    </div>

					<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
						
						<div class="events-name">
							<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
								<?echo $arItem["NAME"]?>
							</a>
						</div>
					<?endif;?>

					<?if(is_array($arItem["DISPLAY_PROPERTIES"]["hall"])):?>
						<div class="events-hall">
                            <? if(is_array($arItem["DISPLAY_PROPERTIES"]["hall"]["DISPLAY_VALUE"])): ?>
							    <?=implode(', ', $arItem["DISPLAY_PROPERTIES"]["hall"]["DISPLAY_VALUE"])?>
                            <? else: ?>
                                <?=$arItem["DISPLAY_PROPERTIES"]["hall"]["DISPLAY_VALUE"]?>
                            <? endif; ?>
						</div>
					<?endif;?>


					<?if(is_array($arItem["DISPLAY_PROPERTIES"]["age"])):?>
						<div class="events-age">
							<?=$arItem["DISPLAY_PROPERTIES"]["age"]["DISPLAY_VALUE"]?>
						</div>
					<?endif;?>

                    <? if(strlen(trim($arItem['DISPLAY_PROPERTIES']['link_kassir']['VALUE'])) > 0): ?>
                        <a href="<?=$arItem['DISPLAY_PROPERTIES']['link_kassir']['VALUE']?>" class="no-link"><div class="buy-ticket">Купить билет</div></a>
                    <? endif; ?>

				</div>

			</div>
			</div>
		<?endforeach;?>

		
	</div>
</div>


<script type="text/javascript">
	function setEqualHeight(columns)
	{
	var tallestcolumn = 0;
	columns.each(
	function()
	{
	currentHeight = $(this).height();
	if(currentHeight > tallestcolumn)
	{
	tallestcolumn = currentHeight;
	}
	}
	);
	columns.height(tallestcolumn);
	}
	$(document).ready(function() {
	setEqualHeight($(".columns > div"));
	});
</script>

<script>
	var owl = $('#owl-events-slider');
		owl.owlCarousel({
			loop : true,
			dots : true,
			margin : 5,
			nav : true,
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
			}
		});

</script>
	</div><!-- .wrapper -->
</div><!-- .events-block -->
