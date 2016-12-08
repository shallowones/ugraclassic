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

        <h1>Фотоотчет</h1>
<div class="photogalereya-slider">
	<div id="owl-photogalereya-slider" class="owl-carousel owl-theme">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>

			<? $foto = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>1313, 'height'=>500), BX_RESIZE_IMAGE_EXACT , true);?>
			
			<div class="photogalereya-item" style="background:url(<?=$foto["src"]?>) no-repeat center center" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				
				<div class="album-name">
					<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
				</div>

			</div>

		<?endforeach;?>

		
	</div>
</div>
    </div><!-- .wrapper -->
</div><!-- .events-block -->

<script>
	var owl = $('#owl-photogalereya-slider');
		owl.owlCarousel({
			items : 1,
			loop : true,
			dots : true,
			nav: true,
			margin : 5,
			autoplay : false, 
			autoplayTimeout : 15000, 
			autoplayHoverPause : true,
			smartSpeed : 500,
			mouseDrag : true,
			navText : ["<i></i>","<i></i>"]
		});

</script>
<? endif; ?>