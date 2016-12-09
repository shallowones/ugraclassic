<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
    <h1><? echo $arResult['NAME'] ?></h1>
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="groups__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <a href="<? echo $arItem['DETAIL_PAGE_URL'] ?>" title="<? echo $arItem["NAME"] ?>">
                <img src="<? echo $arItem['PREVIEW_PICTURE']['SRC'] ?>" title="<? echo $arItem["NAME"] ?>">
                <h2><? echo $arItem["NAME"] ?></h2>
            </a>
        </div>
    <? endforeach; ?>
</div>
