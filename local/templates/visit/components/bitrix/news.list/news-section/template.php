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
        <?$pic = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>700, 'height'=>360), BX_RESIZE_IMAGE_EXACT, true);?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <div class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                    <img class="preview_picture"
                         border="0"
                         src="<?=$pic["src"]?>"
                         width="306"
                         alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                         title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                    />
                </a>
            <?endif?>

            <div class="news-info">

                <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                    <div class="news-date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></div>
                <?endif?>

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

        </div>

        <div class="clrb"></div>
    <?endforeach;?>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
</div>
