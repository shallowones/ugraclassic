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
<div class="3d-panarams-slider">
	<div id="3d-panaram-carusel" class="owl-carousel owl-theme">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<? $slide = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>306, 'height'=>185), BX_RESIZE_IMAGE_EXACT, true);?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="item-3d" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
						<a href="<?=$arItem["DISPLAY_PROPERTIES"]["URL"]["~VALUE"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>">
							<img border="0"
								src="<?=$slide["src"]?>"
								width="100%"
								height="100%"
								alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
								title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
							/>
						</a>
			<?endif?>
			
		</div>
	<?endforeach;?>
	</div>
</div>
<script>
	var owl = $('#3d-panaram-carusel');
		owl.owlCarousel({
			items : 4,
			center : true,
			margin : 3,
			loop : true,
			dots : false,
			nav : false,
			autoplay : false, 
			autoplayTimeout : 15000, 
			autoplayHoverPause : true,
			smartSpeed : 500,
			mouseDrag : true
		});

</script>