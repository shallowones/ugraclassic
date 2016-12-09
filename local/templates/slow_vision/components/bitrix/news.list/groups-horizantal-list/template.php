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
<div class="groups" style="width: 1313px; margin: 0 auto;padding: 20px 35px;">
    <h1>Коллективы</h1>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<? $img_gr = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>226, 'height'=>200), BX_RESIZE_IMAGE_EXACT, true);?>

    <div class="groups__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <a href="<?=$arItem["DISPLAY_PROPERTIES"]["URL"]["~VALUE"]?>" title="<?echo $arItem["NAME"]?>" alt="<?echo $arItem["NAME"]?>">
            <img src="<?=$img_gr["src"]?>" title="<?echo $arItem["NAME"]?>" alt="<?echo $arItem["NAME"]?>">
            <h2><?echo $arItem["NAME"]?></h2>
        </a>
    </div>
<?endforeach;?>

</div>
