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
<div class="news-complex">
    <?if($arParams["DISPLAY_TOP_PAGER"]):?>
        <?=$arResult["NAV_STRING"]?><br />
    <?endif;?>
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?$pic = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>175, 'height'=>175), BX_RESIZE_IMAGE_EXACT, true);?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <div class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

            <div class="news-info">

                <?if($arItem["ACTIVE_FROM"]):?>
                    <div class="news-date">
                        <?$date = ParseDateTime($arItem["ACTIVE_FROM"], FORMAT_DATETIME); $date = $date["DD"]." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S")); echo $date;?>
                    </div>
                <?endif;?>

                <div class="news-name-text-box">
                    <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                        <div class="news-name">
                            <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
                                <?echo $arItem["NAME"]?>
                            </a>
                        </div>
                    <?endif;?>

                    <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                        <div class="news-text">
                            <?echo $arItem["PREVIEW_TEXT"];?>
                        </div>
                    <?endif;?>
                </div>

            </div>

        </div><br>

        <div class="clrb"></div>
    <?endforeach;?>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
</div>
<a href="<?=$arParams["LINK_TO_NEWS"]?>" class="all-tape-news">
    <div class="all">
        Все новости
    </div>
</a>
