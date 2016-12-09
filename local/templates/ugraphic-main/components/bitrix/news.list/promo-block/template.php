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
<? if(count($arResult["ITEMS"]) > 0): ?>
    <? if($arResult["ITEMS"][0]['PROMO_DISPLAY']): ?>
        <div id="slider-promo">
            <a href="<?=$arResult["ITEMS"][0]['PROMO_DISPLAY']["URL"];?>" alt="" title="">
                <div class="item">

                <div class="slider-info">

                        <div class="info-box">
                            <? if(!empty($arResult["ITEMS"][0]['PROMO_DISPLAY']['DATE'])): ?>
                                <div class="date">
                                    <?=$arResult["ITEMS"][0]['PROMO_DISPLAY']['DATE']?>
                                </div>
                            <? endif; ?>

                            <? if(!empty($arResult["ITEMS"][0]['PROMO_DISPLAY']['NAME'])): ?>
                                <div class="name">
                                    <?=$arResult["ITEMS"][0]['PROMO_DISPLAY']['NAME']?>
                                </div>
                            <? endif; ?>
                        </div>

                        <? if(!empty($arResult["ITEMS"][0]['PROMO_DISPLAY']['AGE'])): ?>
                            <div class="age">
                                <?=$arResult["ITEMS"][0]['PROMO_DISPLAY']['AGE']?>
                            </div>
                        <? endif; ?>
                        <? if(strlen(trim($arResult["ITEMS"][0]['PROMO_DISPLAY']['LINK_KASSIR'])) > 0): ?>
                            <a href="<?=$arResult["ITEMS"][0]['PROMO_DISPLAY']['LINK_KASSIR']?>" class="no-link"><div class="buy-ticket">Купить билет</div></a>
                        <? endif; ?>

                </div>

                <div class="mask-1"></div>
                    <? if(is_array($arResult["ITEMS"][0]['PROMO_DISPLAY']['PICTURE'])): ?>
                        <img 	class="img-box"
                                src="<?=$arResult["ITEMS"][0]['PROMO_DISPLAY']['PICTURE']["src"]?>"
                                width="<?=$arResult["ITEMS"][0]['PROMO_DISPLAY']['PICTURE']["width"]?>"
                                height="<?=$arResult["ITEMS"][0]['PROMO_DISPLAY']['PICTURE']["height"]?>"
                                 />
                    <? endif; ?>
                </div>
            </a>
        </div>
    <? endif; ?>

    <? if($arResult["ITEMS"][1]['PROMO_DISPLAY'] || $arResult["ITEMS"][2]['PROMO_DISPLAY']): ?>
    <div class="promo-right-col">
        <? if($arResult["ITEMS"][1]['PROMO_DISPLAY']): ?>
            <div class="promo-right-item">
                <div class="slider-info">
                    <div class="info-box">
                        <? if(!empty($arResult["ITEMS"][1]['PROMO_DISPLAY']['DATE'])): ?>
                            <div class="date">
                                <?=$arResult["ITEMS"][1]['PROMO_DISPLAY']['DATE']?>
                            </div>
                        <? endif; ?>
                        <? if(!empty($arResult["ITEMS"][1]['PROMO_DISPLAY']['NAME'])): ?>
                            <div class="name">
                                <?=$arResult["ITEMS"][1]['PROMO_DISPLAY']['NAME']?>
                            </div>
                        <? endif; ?>
                    </div>
                    <? if(!empty($arResult["ITEMS"][1]['PROMO_DISPLAY']['AGE'])): ?>
                        <div class="age">
                            <?=$arResult["ITEMS"][1]['PROMO_DISPLAY']['AGE']?>
                        </div>
                    <? endif; ?>
                </div>
                <div class="mask-2-3"></div>
                <? if(is_array($arResult["ITEMS"][1]['PROMO_DISPLAY']['PICTURE'])): ?>
                    <img 	class="img-right"
                            src="<?=$arResult["ITEMS"][1]['PROMO_DISPLAY']['PICTURE']["src"]?>"
                            width="<?=$arResult["ITEMS"][1]['PROMO_DISPLAY']['PICTURE']["width"]?>"
                            height="<?=$arResult["ITEMS"][1]['PROMO_DISPLAY']['PICTURE']["height"]?>"
                    />
                <? endif; ?>
            </div>
        <? endif; ?>

        <? if($arResult["ITEMS"][2]['PROMO_DISPLAY']): ?>
            <div class="promo-right-item">
                <div class="slider-info">
                    <div class="info-box">
                        <? if(!empty($arResult["ITEMS"][2]['PROMO_DISPLAY']['DATE'])): ?>
                            <div class="date">
                                <?=$arResult["ITEMS"][2]['PROMO_DISPLAY']['DATE']?>
                            </div>
                        <? endif; ?>
                        <? if(!empty($arResult["ITEMS"][2]['PROMO_DISPLAY']['NAME'])): ?>
                            <div class="name">
                                <?=$arResult["ITEMS"][2]['PROMO_DISPLAY']['NAME']?>
                            </div>
                        <? endif; ?>
                    </div>
                    <? if(!empty($arResult["ITEMS"][2]['PROMO_DISPLAY']['AGE'])): ?>
                        <div class="age">
                            <?=$arResult["ITEMS"][2]['PROMO_DISPLAY']['AGE']?>
                        </div>
                    <? endif; ?>
                </div>
                <div class="mask-2-3"></div>
                <? if(is_array($arResult["ITEMS"][2]['PROMO_DISPLAY']['PICTURE'])): ?>
                    <img 	class="img-right"
                            src="<?=$arResult["ITEMS"][2]['PROMO_DISPLAY']['PICTURE']["src"]?>"
                            width="<?=$arResult["ITEMS"][2]['PROMO_DISPLAY']['PICTURE']["width"]?>"
                            height="<?=$arResult["ITEMS"][2]['PROMO_DISPLAY']['PICTURE']["height"]?>"
                    />
                <? endif; ?>
            </div>
        <? endif; ?>

    </div><!-- .promo-right-col -->
    <? endif; ?>
<? endif; ?>