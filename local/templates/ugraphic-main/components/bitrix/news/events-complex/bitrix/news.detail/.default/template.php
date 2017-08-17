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
            <? $detail_img = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>300, 'height'=>'auto'), BX_RESIZE_IMAGE_PROPORTIONAL_EXT, true);?>
            <img
                    border="0"
                    src="<?=$detail_img["src"]?>"
                    width="<?=$detail_img["width"]?>"
                    height="<?=$detail_img["height"]?>"
                    alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
                    title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
            />
        <?else:?>
            <?
            $detail_img = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], array('width'=>305, 'height'=>430), BX_RESIZE_IMAGE_PROPORTIONAL_EXT, true);
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
                    <li class="afisha-w__item">
                        <span>Время:</span>
                        <? if(strlen(trim($arResult['PROPERTIES']['other_time']['VALUE'])) > 0): ?>
                            <?=$arResult['PROPERTIES']['other_time']['VALUE']?>
                        <? else: ?>
                            <? echo ConvertDateTime($arResult["ACTIVE_FROM"],"HH:MI"); ?>
                        <? endif; ?>
                    </li>
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
                <? if($arResult['DISPLAY_PROPERTIES']['buy_ticket']['VALUE'] != 'Да' && isset($arResult["DISPLAY_PROPERTIES"]["cost"])): ?>
                    <li class="afisha-w__item"><span>Цена билета:</span> <?=$arResult["DISPLAY_PROPERTIES"]["cost"]["DISPLAY_VALUE"]?></li>
                <? endif; ?>
            </ul>
            <? if($arResult['DISPLAY_PROPERTIES']['buy_ticket']['VALUE'] == 'Да' && !strlen($arParams["BACK_URL"])): ?>
                <div class="afisha-ticket">
                    <?if(isset($arResult["DISPLAY_PROPERTIES"]["cost"])):?>
                        <div class="tick">
                            <div class="tick-1"><span>Цена билета:</span></div>
                            <div class="tick-2"><?=$arResult["DISPLAY_PROPERTIES"]["cost"]["DISPLAY_VALUE"]?></div>
                        </div>
                    <?endif?>
                    <div class="tick">
                        <? if(intval($arResult['DISPLAY_PROPERTIES']['link_kassir']['VALUE']) > 0): ?>
                            <?/*<a href="https://hm.kassir.ru/kassirwidget/event/<?=$arResult['DISPLAY_PROPERTIES']['link_kassir']['VALUE']?>?key=ff01bc2d-7012-9f23-e03c-cf3e49f87b30" target="_blank">Купить билет онлайн</a>*/?>
                            <a href="javascript:void();" onclick="kassirWidget.summon({url:'https://hm.kassir.ru/frame/entry/index/<?=$arResult['DISPLAY_PROPERTIES']['link_kassir']['VALUE']?>?type=A&key=7f4d1d66-fe66-c762-a4ec-2d94af6176d9'})">Купить билет онлайн</a>
                        <? else: ?>
                            <?/*<a href="javascript:void();" onclick="kassirWidget.summon({url:'https://hm.kassir.ru/kassirwidget/ro?key=ff01bc2d-7012-9f23-e03c-cf3e49f87b30'})">Купить билет онлайн</a>*/?>
                            <a href="javascript:void();" onclick="kassirWidget.summon({url:'https://hm.kassir.ru/bilety-na-koncert?key=ff01bc2d-7012-9f23-e03c-cf3e49f87b30'})">Купить билет онлайн</a>
                        <? endif; ?>
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