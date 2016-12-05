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
<div class="control-list">

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
<? $foto1 = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>300, 'height'=>400), BX_RESIZE_IMAGE_PROPORTIONAL, true);?> 

<? $foto2 = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>1000, 'height'=>1200), BX_RESIZE_IMAGE_PROPORTIONAL, true);?> 

	<div class="control-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?=$foto2["src"]?>" rel="zoom"><img
						class="preview_picture"
						border="0"
						src="<?=$foto1["src"]?>"
						width="<?=$foto1["width"]?>"
						height="<?=$foto1["height"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						/></a>
			<?endif;?>
		<?endif?>


		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<div class="control-name">
					<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
				</div>
			<?endif;?>
		<?endif;?>

		<?if(isset($arItem["DISPLAY_PROPERTIES"]["post"]["DISPLAY_VALUE"])):?>
			<div class="contorl-post">
				<?=$arItem["DISPLAY_PROPERTIES"]["post"]["DISPLAY_VALUE"]?>
			</div>
		<?endif?>

		<?if(isset($arItem["DISPLAY_PROPERTIES"]["email"]["DISPLAY_VALUE"])):?>
			<div class="contorl-mail">
				<a href="mailto:<?=$arItem["DISPLAY_PROPERTIES"]["email"]["DISPLAY_VALUE"]?>"><?=$arItem["DISPLAY_PROPERTIES"]["email"]["DISPLAY_VALUE"]?></a>
			</div>
		<?endif?>

		<?if(isset($arItem["DISPLAY_PROPERTIES"]["phone"]["DISPLAY_VALUE"])):?>
			<div class="control-phone">
				<?=$arItem["DISPLAY_PROPERTIES"]["phone"]["DISPLAY_VALUE"]?>
			</div>
		<?endif?>


	</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
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