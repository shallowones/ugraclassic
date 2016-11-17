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
/*
````````````````````````````````````````````````````````````````
`¶¶¶¶¶¶```¶¶¶¶¶``¶¶¶¶¶```¶¶``¶¶```¶¶¶¶¶``¶¶``¶¶```¶¶¶¶¶``¶¶¶¶¶``
`¶¶``````¶¶``¶¶``¶¶``¶¶``¶¶``¶¶``¶¶``¶¶``¶¶`¶¶```¶¶``¶¶``¶¶``¶¶`
`¶¶``````¶¶``¶¶``¶¶¶¶¶```¶¶¶¶¶¶``¶¶``¶¶``¶¶¶¶````¶¶``¶¶``¶¶``¶¶`
`¶¶``````¶¶``¶¶``¶¶``¶¶``¶¶``¶¶``¶¶``¶¶``¶¶`¶¶```¶¶``¶¶``¶¶``¶¶`
`¶¶```````¶¶¶¶```¶¶¶¶¶```¶¶``¶¶```¶¶¶¶```¶¶``¶¶```¶¶¶¶```¶¶¶¶¶``
````````````````````````````````````````````````````````````````
Делал без энтузиазма, подозреваю что можно сделать лучше, но было лень придумывать, как.
*/
$this->setFrameMode(true);
?>
<div id="slider-promo" class="owl-carousel" data-slider-id="1">
	<?$counter = 0;?>
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<a href="<?=$arItem["PROPERTIES"]["URL"]["~VALUE"];?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>">
			<div class="item" data-hash="promo-<?=$counter?>">
				<img 	class="img-box"  
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						alt="<?=$arItem["NAME"]?>"
						title="<?=$arItem["NAME"]?>"
						 />
			</div>
		</a>
		<?$counter++;?>
	<?endforeach;?>

</div>

<div class="promo-right-col owl-thumbs" data-slider-id="1">	
		<?$mini_img = CFile::ResizeImageGet($arResult["ITEMS"][0]["PREVIEW_PICTURE"], array('width'=>310, 'height'=>201), BX_RESIZE_IMAGE_EXACT, true); ?>		
		<div class="promo-right-item owl-thumb-item promo-inactive">	
					<img 	class="img-right"  
							src="<?=$mini_img["src"]?>"
							width="<?=$mini_img["width"]?>"
							height="<?=$mini_img["height"]?>"
							alt="<?=$arResult["ITEMS"][0]["NAME"]?>"
							title="<?=$arResult["ITEMS"][0]["NAME"]?>"
					 />
		</div>
		<?$mini_img = CFile::ResizeImageGet($arResult["ITEMS"][1]["PREVIEW_PICTURE"], array('width'=>310, 'height'=>201), BX_RESIZE_IMAGE_EXACT, true); ?>
		<div class="promo-right-item owl-thumb-item ">	
					<img 	class="img-right"  
							src="<?=$mini_img["src"]?>"
							width="<?=$mini_img["width"]?>"
							height="<?=$mini_img["height"]?>"
							alt="<?=$arResult["ITEMS"][1]["NAME"]?>"
							title="<?=$arResult["ITEMS"][1]["NAME"]?>"
					 />
		</div>

		<?$mini_img = CFile::ResizeImageGet($arResult["ITEMS"][2]["PREVIEW_PICTURE"], array('width'=>310, 'height'=>201), BX_RESIZE_IMAGE_EXACT, true); ?>
		<div class="promo-right-item owl-thumb-item">	
					<img 	class="img-right"  
							src="<?=$mini_img["src"]?>"
							width="<?=$mini_img["width"]?>"
							height="<?=$mini_img["height"]?>"
							alt="<?=$arResult["ITEMS"][2]["NAME"]?>"
							title="<?=$arResult["ITEMS"][2]["NAME"]?>"
					 />
		</div>
</div><!-- .promo-right-col -->

<script>
	$(document).ready(function() {
		$('#slider-promo').owlCarousel({
			items : 1,
			loop : false,
			dots : false,
			autoplay : false, 
			smartSpeed : 100,
	        startPosition: '#promo-0',
	      	animateOut : "fadeOut",
  			mouseDrag : false,
  			onInitialized : UblockPromoRightCol,
  			thumbs: true,
  			thumbsPrerendered: true
		});
		function UblockPromoRightCol(){
			$('.promo-right-item').click(function(){
				$('.promo-inactive').removeClass('promo-inactive');
				$(this).addClass('promo-inactive');				
		  	})
		}
		
	});	

</script>