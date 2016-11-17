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
<div class="photoalbum-detail">


	<?if($arResult["PREVIEW_TEXT"]!=""):?>
		<div class="photoalbum-detail-text">
			<?echo $arResult["PREVIEW_TEXT"];?>
		</div>
	<?endif;?>

	<div class="clrb"></div>

<? 

 // (галерея)
 if(count($arResult["DISPLAY_PROPERTIES"]["PHOTO"]["VALUE"])>0):?> 
 	<?if (count($arResult["DISPLAY_PROPERTIES"]["PHOTO"]["VALUE"]) == 1):?>
 		<div class="photoalbum-gallery">
			 <? $file = CFile::ResizeImageGet($arResult["DISPLAY_PROPERTIES"]["PHOTO"]["FILE_VALUE"], array('width'=>'220', 'height'=>'180'), BX_RESIZE_IMAGE_EXACT, true); ?> 		 
				 <div class="photoalbum-gallery-img">
					 <a href="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTO"]["FILE_VALUE"]["SRC"]?>" name="news_gallery" rel="news_slider" target="_blank"> 
						 <img border="0" src="<?=$file["src"]?>" width="<?=$file["width"]?>" height="<?=$file["height"]?>" 
						 alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>"/> 
					 </a> 
				</div>		
		</div> 	
 	<?else:?>
	 	<div class="photoalbum-gallery">		
		 <?foreach($arResult["DISPLAY_PROPERTIES"]["PHOTO"]["FILE_VALUE"] as $PHOTO):?> 
			 <? $file = CFile::ResizeImageGet($PHOTO, array('width'=>'220', 'height'=>'180'), BX_RESIZE_IMAGE_EXACT, true); ?>
				 <div class="photoalbum-gallery-img">
					 <a href="<?=$PHOTO["SRC"]?>" name="news_gallery" rel="news_slider" target="_blank"> 
						 <img border="0" src="<?=$file["src"]?>" width="<?=$file["width"]?>" height="<?=$file["height"]?>" 
						 alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>"/> 
					 </a> 
				</div>		
		 <?endforeach?> 
		</div> 
	<?endif?>
 <?endif?> 



<script type="text/javascript">
	$(document).ready(function() {
		$("a[rel=news_slider]").fancybox({
				padding : 0,
				prevEffect		: 'none',
				nextEffect		: 'none',
				});
	});
</script>




	<?
	if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="photoalbum-detail-share">
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