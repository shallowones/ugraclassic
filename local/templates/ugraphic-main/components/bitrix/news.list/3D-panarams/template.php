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
<div class="panaram3d-box">
	<div id="panaram3d" class="owl-carousel owl-theme">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<? $slide = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>400, 'height'=>285), BX_RESIZE_IMAGE_EXACT, true);?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		
		<a href="<?=$arItem["DISPLAY_PROPERTIES"]["URL"]["~VALUE"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>">
			<div class="item-3d" id="<?=$this->GetEditAreaId($arItem['ID']);?>" style="background:url('<?=$slide["src"]?>') no-repeat center center;">
			</div>
		</a>
	<?endforeach;?>
	</div>
</div>
<script>
	var owl = $('#panaram3d');
		owl.owlCarousel({
		    loop:true,
		    margin:10,
		    nav:true,
		    dots : true,
		    autoplay : false, 
			autoplayTimeout : 15000, 
			autoplayHoverPause : true,
			smartSpeed : 500,
		    navText : ["<i></i>","<i></i>"],
		    responsive:{
				0:{
					items:2,
					mouseDrag : true,
				},
				758:{
					items:3,
					mouseDrag : true,
				},
        		1000:{
            		items:4,
            		mouseDrag : false,
        		},
        		1400:{
            		items:5,
            		mouseDrag : false,
        		}
        	}
		});

</script>