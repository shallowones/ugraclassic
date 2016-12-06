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
<ul class="team">
<?foreach($arResult["ITEMS"] as $arItem):?>
    <?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <li class="team__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="team-img">
            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                <? $pic = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>210, 'height'=>280), BX_RESIZE_IMAGE_EXACT, true); ?>
                <img src="<?=$pic["src"]?>" width="<?=$pic["width"]?>" height="<?=$pic["height"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>">
            <? elseif ($arItem["PROPERTIES"]["SEX"]['VALUE_XML_ID'] == 'woman'): ?>
                <img src="<? echo SITE_TEMPLATE_PATH . '/img/no-photo_w.png' ?>">
            <?else:?>
                <img src="<? echo SITE_TEMPLATE_PATH . '/img/man.png' ?>">
            <?endif?>
        </div>
        <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
            <div class="team-name"><?echo $arItem["NAME"]?></div>
        <?endif?>
        <? if($arItem['DISPLAY_PROPERTIES']['PHONE']['DISPLAY_VALUE']): ?>
            <div class="team-phone"><?=$arItem['DISPLAY_PROPERTIES']['PHONE']['DISPLAY_VALUE']?></div>
        <? endif; ?>
        <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
            <p><?echo $arItem["PREVIEW_TEXT"];?></p>
        <?endif;?>
	</li>
<?endforeach;?>
</ul>
