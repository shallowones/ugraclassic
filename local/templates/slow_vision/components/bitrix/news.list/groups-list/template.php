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
<div class="groups-list">

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<? $img_gr = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>465, 'height'=>200), BX_RESIZE_IMAGE_EXACT, true);?>

	<div class="groups-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<a href="<?=$arItem["DISPLAY_PROPERTIES"]["URL"]["~VALUE"]?>" title="<?echo $arItem["NAME"]?>" alt="<?echo $arItem["NAME"]?>">
			
			<div class="img_gr">
				<img src="<?=$img_gr["src"]?>" title="<?echo $arItem["NAME"]?>" alt="<?echo $arItem["NAME"]?>" class="image">

				<div class="name"><?echo $arItem["NAME"]?></div>

				<div class="item-mask"></div>
			</div>
		</a>

	</div>
<?endforeach;?>

</div>
