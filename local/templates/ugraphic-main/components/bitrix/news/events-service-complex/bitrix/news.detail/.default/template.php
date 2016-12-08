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
<? if(isset($arResult["DISPLAY_PROPERTIES"]["sub_header"])): ?>
    <div class="afisha-detail__top"><?=$arResult["DISPLAY_PROPERTIES"]["sub_header"]['DISPLAY_VALUE']?></div>
<? endif; ?>
<div class="afisha-detail">
    <div class="afisha-detail__img">
        <?if($arResult["DETAIL_PICTURE"]!=""):?>
            <? $detail_img = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>305, 'height'=>430), BX_RESIZE_IMAGE_PROPORTIONAL_EXT, true);?>
            <img
                    border="0"
                    src="<?=$detail_img["src"]?>"
                    width="<?=$detail_img["width"]?>"
                    height="<?=$detail_img["height"]?>"
                    alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
                    title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
            />
        <?else:?>
            <? $detail_img = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], array('width'=>305, 'height'=>430), BX_RESIZE_IMAGE_PROPORTIONAL_EXT, true);
            if(!isset($detail_img["src"]))
            {
                $detail_img["src"] = SITE_TEMPLATE_PATH . '/img/no-photo-afishe.png';
            }
            ?>
            <img
                    border="0"
                    src="<?=$detail_img["src"]?>"
                    width="<?=$detail_img["width"]?>"
                    height="<?=$detail_img["height"]?>"
                    alt="<?=$arResult["PREVIEW_PICTURE"]["ALT"]?>"
                    title="<?=$arResult["PREVIEW_PICTURE"]["TITLE"]?>"
            />
        <?endif?>
    </div>
    <div class="afisha-detail__desc">
        <div class="afisha-detail__header">
            <ul class="afisha-w">
                <?if(isset($arResult["ACTIVE_FROM"])):?>
                    <?
                    $date = ParseDateTime($arResult["ACTIVE_FROM"], FORMAT_DATETIME);
                    $date = intval($date["DD"])." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S"));
                    ?>
                    <li class="afisha-w__item"><span>Дата:</span> <i class="orange">
                        <? if(is_array($arResult["DISPLAY_PROPERTIES"]["date_text"])): ?>
                            <?=$arResult["DISPLAY_PROPERTIES"]["date_text"]["DISPLAY_VALUE"]?>
                        <? else: ?>
                            <?
                            $date = ParseDateTime($arResult["ACTIVE_FROM"], FORMAT_DATETIME);
                            $date = intval($date["DD"])." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S"));
                            ?>
                            <?echo $date;?>, <?=ToLower(FormatDate("l", MakeTimeStamp($arResult["ACTIVE_FROM"])))?>
                        <? endif; ?>
                    </i></li>
                    <li class="afisha-w__item"><span>Время:</span> <?echo ConvertDateTime($arResult["ACTIVE_FROM"],"HH:MI");?></li>
                <?endif?>
                <?if(isset($arResult["DISPLAY_PROPERTIES"]["hall"])):?>
                    <li class="afisha-w__item"><span>Место:</span>
                        <? if(is_array($arResult["DISPLAY_PROPERTIES"]["hall"]["DISPLAY_VALUE"])): ?>
                            <?=implode(', ', $arResult["DISPLAY_PROPERTIES"]["hall"]["DISPLAY_VALUE"])?>
                        <? else: ?>
                            <?=$arResult["DISPLAY_PROPERTIES"]["hall"]["DISPLAY_VALUE"]?>
                        <? endif; ?>
                    </li>
                <?endif?>
                <?if(isset($arResult["DISPLAY_PROPERTIES"]["info_reserv_ticket"])):?>
                    <li class="afisha-w__item m-top20"><span>Информация и бронирование билетов:</span> <i
                                class="number"><?=$arResult["DISPLAY_PROPERTIES"]["info_reserv_ticket"]["DISPLAY_VALUE"]?></i></li>
                <?endif?>
                <? if(strlen(trim($arResult['DISPLAY_PROPERTIES']['link_kassir']['VALUE'])) < 1 && isset($arResult["DISPLAY_PROPERTIES"]["cost"])): ?>
                    <li class="afisha-w__item"><span>Цена билета:</span> <?=$arResult["DISPLAY_PROPERTIES"]["cost"]["DISPLAY_VALUE"]?></li>
                <? endif; ?>
            </ul>
            <? if(strlen(trim($arResult['DISPLAY_PROPERTIES']['link_kassir']['VALUE'])) > 0): ?>
                <div class="afisha-ticket">
                    <?if(isset($arResult["DISPLAY_PROPERTIES"]["cost"])):?>
                        <div class="tick">
                            <div class="tick-1"><span>Цена билета:</span></div>
                            <div class="tick-2"><?=$arResult["DISPLAY_PROPERTIES"]["cost"]["DISPLAY_VALUE"]?></div>
                        </div>
                    <?endif?>
                    <div class="tick">
                        <a href="<?=$arResult['DISPLAY_PROPERTIES']['link_kassir']['VALUE']?>">Купить билет онлайн</a>
                    </div>
                </div>
            <? endif; ?>
            <?if(isset($arResult["DISPLAY_PROPERTIES"]["age"])):?>
                <div class="age"><?=$arResult["DISPLAY_PROPERTIES"]["age"]["DISPLAY_VALUE"]?></div>
            <?endif?>
        </div>
        <?if(strlen($arResult["DETAIL_TEXT"])>0):?>
            <hr>
            <div class="afisha-detail__text">
                <?echo $arResult["DETAIL_TEXT"];?>
            </div>
        <?endif?>
    </div>
</div>