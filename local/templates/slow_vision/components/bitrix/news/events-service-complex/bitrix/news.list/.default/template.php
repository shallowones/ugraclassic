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
<div class="afisha">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="afisha__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="afisha-info">
                    <div class="afisha-desc">
                        <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
                        <h3><?echo $arItem["NAME"].'  '.$arItem["DISPLAY_PROPERTIES"]["age"]["DISPLAY_VALUE"]?></h3>
                        </a>
                        <ul class="afisha-w">
                            <?if(isset($arItem["ACTIVE_FROM"])):?>
                                <?
                                $date = ParseDateTime($arItem["ACTIVE_FROM"], FORMAT_DATETIME);
                                $date = $date["DD"]." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S"));
                                ?>
                                <li class="afisha-w__item"><span>Дата:</span> <?echo $date;?></li>
                                <li class="afisha-w__item"><span>Время:</span> <?echo ConvertDateTime($arItem["ACTIVE_FROM"],"HH:MI");?></li>
                            <?endif;?>
                            <?if(isset($arItem["DISPLAY_PROPERTIES"]["hall"])):?>
                                <li class="afisha-w__item"><span>Место:</span> <?=$arItem["DISPLAY_PROPERTIES"]["hall"]["DISPLAY_VALUE"]?></li>
                            <?endif;?>
                        </ul>
                    </div>
                <div class="afisha-ticket">
                    <?if(isset($arItem["DISPLAY_PROPERTIES"]["cost"])):?>
                        <div class="tick">
                            Цена билета: <?=$arItem["DISPLAY_PROPERTIES"]["cost"]["DISPLAY_VALUE"]?>
                            </div>
                    <? endif; ?>
                    <? if(strlen(trim($arItem['DISPLAY_PROPERTIES']['link_kassir']['VALUE'])) > 0): ?>
                        <div class="tick">
                            <a href="<?=$arItem['DISPLAY_PROPERTIES']['link_kassir']['VALUE']?>">Купить билет онлайн</a>
                        </div>
                    <? endif; ?>
                </div>
            </div>
        </div>
    <?endforeach;?>

    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <?=$arResult["NAV_STRING"]?>
    <?endif;?>
</div>
