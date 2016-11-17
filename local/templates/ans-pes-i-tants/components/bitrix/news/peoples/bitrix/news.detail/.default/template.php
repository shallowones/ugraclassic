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
<? $foto1 = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], array('width'=>310, 'height'=>435), BX_RESIZE_IMAGE_EXACT, true);?> 

<? $foto2 = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], array('width'=>1000, 'height'=>1200), BX_RESIZE_IMAGE_PROPORTIONAL, true);?> 



<div class="artist-detail">
	<?if(is_array($arResult["PREVIEW_PICTURE"])):?>
		<a href="<?=$foto2["src"]?>" rel="zoom" target="_blank">
		<img
			class="detail-picture"
			border="0"
			src="<?=$foto1["src"]?>"
			width="<?=$foto1["width"]?>"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
		</a>
	<?endif?>


	<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
		<div class="detail-text">
			<?echo $arResult["DETAIL_TEXT"];?>
		</div>
	<?endif?>
	
	
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

<script type="text/javascript">
	$(document).ready(function() {
		$("a[rel=zoom]").fancybox({
				padding : 0,
				prevEffect		: 'none',
				nextEffect		: 'none',
				});
	});
</script>