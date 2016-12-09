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
$year = intval($arParams['YEAR'])
?>
<? if(count($arResult['DOC_YEARS']) > 0): ?>
<div class="filter-years">
    <ul class="categories">
        <? foreach ($arResult['DOC_YEARS'] as $key => $arYear): ?>
        <li style="display: inline" class="categories__item <?if($arYear['NAME'] == $year || (empty($year) && $key == 0)):?>cat-active<? endif; ?>">
            <?=$arYear['NAME']?> <input value="<?=$arYear['NAME']?>" name="YEAR" title="" type="hidden"> </li>
        <? endforeach; ?>
    </ul>
</div>
<br>
<br>
<? endif; ?>
<ul class="documents">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <li class="documents__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <a href="<?=$arItem['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE']['SRC']?>">

            <div class="description">
                <div class="doc-name">
                    <?=$arItem['NAME']?>
                </div>
            </div>
        </a>
        <p>
            <?=ToLower(end(explode('.', $arItem['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE']['FILE_NAME'])))?>
            (<?=\UW\Services::FBytes($arItem['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE']['FILE_SIZE'], 0)?>)
        </p><br>
    </li>
<?endforeach;?>
</ul>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

