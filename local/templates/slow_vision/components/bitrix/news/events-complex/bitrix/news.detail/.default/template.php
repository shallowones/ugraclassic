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
            <ul class="afisha-w">
                <?if(isset($arResult["ACTIVE_FROM"])):?>
                    <?
                    $date = ParseDateTime($arResult["ACTIVE_FROM"], FORMAT_DATETIME);
                    $date = intval($date["DD"])." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S"));
                    ?>
                    <li class="afisha-w__item"><span>Дата:</span> <i class="orange"><?echo $date;?>, <?=ToLower(FormatDate("l", MakeTimeStamp($arResult["ACTIVE_FROM"])))?></i></li>
                    <li class="afisha-w__item"><span>Время:</span> <?echo ConvertDateTime($arResult["ACTIVE_FROM"],"HH:MI");?></li>
                <?endif?>
                <?if(isset($arResult["DISPLAY_PROPERTIES"]["hall"])):?>
                    <li class="afisha-w__item"><span>Место:</span> <?=$arResult["DISPLAY_PROPERTIES"]["hall"]["DISPLAY_VALUE"]?></li>
                <?endif?>
                <?if(isset($arResult["DISPLAY_PROPERTIES"]["info_reserv_ticket"])):?>
                    <li class="afisha-w__item m-top20"><span>Информация и бронирование билетов:</span> <i
                                class="number"><?=$arResult["DISPLAY_PROPERTIES"]["info_reserv_ticket"]["DISPLAY_VALUE"]?></i></li>
                <?endif?>
            </ul>
            <div class="afisha-ticket">
                <?if(isset($arResult["DISPLAY_PROPERTIES"]["cost"])):?>
                    <div class="tick">
                        Цена билета: <?=$arResult["DISPLAY_PROPERTIES"]["cost"]["DISPLAY_VALUE"]?>
                    </div>
                <?endif?>
                <? if(strlen(trim($arResult['DISPLAY_PROPERTIES']['link_kassir']['VALUE'])) > 0): ?>
                    <div class="tick">
                        <a href="<?=$arResult['DISPLAY_PROPERTIES']['link_kassir']['VALUE']?>">Купить билет онлайн</a>
                    </div>
                <? endif; ?>
            </div>
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