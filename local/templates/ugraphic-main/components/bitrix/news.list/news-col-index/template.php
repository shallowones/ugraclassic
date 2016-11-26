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
<ul class="list">
<?foreach($arResult["ITEMS"] as $arItem):?>
<?$pic = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>175, 'height'=>175), BX_RESIZE_IMAGE_EXACT, true);?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

    <li class="list__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="list-img">
            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                <img src="<?=$pic["src"]?>" width="<?=$pic["width"]?>" height="<?=$pic["height"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>">
            </a>
            <?endif?>
        </div>
        <div class="list-text">
            <?if(is_array($arItem["DISPLAY_PROPERTIES"]["date"])):?>
                <div class="date">
                    <?$date = ParseDateTime($arItem["DISPLAY_PROPERTIES"]["date"]["DISPLAY_VALUE"], FORMAT_DATETIME); $date = $date["DD"]." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S")); echo $date;?>
                </div>
            <?endif;?>
            <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                <div class="name">
                    <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
                </div>
            <?endif;?>
            <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                <p>
                    <?echo $arItem["PREVIEW_TEXT"];?>
                </p>
            <?endif;?>
        </div>
	</li>
<?endforeach;?>
</ul>
<a href="<?=$arParams["LINK_TO_NEWS"]?>" class="all-tape-news">
    <div class="all">
        Все новости
    </div>
</a>

