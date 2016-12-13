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
    <div class="afisha-detail__desc">
        <div class="afisha-detail__header">
                <?if(isset($arResult["ACTIVE_FROM"])):?>
                    <span>Дата:</span> <i class="orange">
                        <? if(is_array($arResult["DISPLAY_PROPERTIES"]["date_text"])): ?>
                            <?=$arResult["DISPLAY_PROPERTIES"]["date_text"]["DISPLAY_VALUE"]?>
                        <? else: ?>
                            <?
                            $date = ParseDateTime($arResult["ACTIVE_FROM"], FORMAT_DATETIME);
                            $date = intval($date["DD"])." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S"));
                            ?>
                            <?echo $date;?>, <?=ToLower(FormatDate("l", MakeTimeStamp($arResult["ACTIVE_FROM"])))?>
                        <? endif; ?>
                    </i>
                    <span>Время:</span> <?echo ConvertDateTime($arResult["ACTIVE_FROM"],"HH:MI");?><br>
                <?endif?>
                <?if(isset($arResult["DISPLAY_PROPERTIES"]["hall"])):?>
                    <span>Место:</span>
                        <? if(is_array($arResult["DISPLAY_PROPERTIES"]["hall"]["DISPLAY_VALUE"])): ?>
                            <?=implode(', ', $arResult["DISPLAY_PROPERTIES"]["hall"]["DISPLAY_VALUE"])?>
                        <? else: ?>
                            <?=$arResult["DISPLAY_PROPERTIES"]["hall"]["DISPLAY_VALUE"]?>
                        <? endif; ?><br>
                <?endif?>
                <?if(isset($arResult["DISPLAY_PROPERTIES"]["info_reserv_ticket"])):?>
                    <span>Информация и бронирование билетов:</span> <i
                                class="number"><?=$arResult["DISPLAY_PROPERTIES"]["info_reserv_ticket"]["DISPLAY_VALUE"]?></i><br>
                <?endif?>
                <? if($arResult['DISPLAY_PROPERTIES']['buy_ticket']['VALUE'] != 'Да' && isset($arResult["DISPLAY_PROPERTIES"]["cost"])): ?>
                    <span>Цена билета:</span> <?=$arResult["DISPLAY_PROPERTIES"]["cost"]["DISPLAY_VALUE"]?><br>
                <? endif; ?>
            <? if($arResult['DISPLAY_PROPERTIES']['buy_ticket']['VALUE'] == 'Да' && !strlen($arParams["BACK_URL"])): ?>
                <div class="afisha-ticket">
                    <?if(isset($arResult["DISPLAY_PROPERTIES"]["cost"])):?>
                        <div class="tick">
                            <div class="tick-1"><span>Цена билета:</span></div>
                            <div class="tick-2"><?=$arResult["DISPLAY_PROPERTIES"]["cost"]["DISPLAY_VALUE"]?></div>
                        </div>
                    <?endif?>
                    <div class="tick">
                        <a href="javascript:void();" onclick="kassirWidget.summon({url:'https://hm.kassir.ru/kassirwidget/ro?key=ff01bc2d-7012-9f23-e03c-cf3e49f87b30'})">Купить билет онлайн</a>
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