<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

<? if (count($arResult["ITEMS"]) > 0): ?>
<div class="wrapper">
<div class="promo-block <? /*wrapper*/ ?>">
    <div class="promo-container">
        <div class="promo-first">
            <div class="promo-swip-container">
                <div class="swiper-wrapper">
                    <? foreach ($arResult['ITEMS'] as $key => $arItem): ?>
                        <? if(!$arItem['IS_PROMO_IBLOCK']): ?>
                        <div class="swiper-slide">
                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>">
                                <div class="promo__item">
                                    <? if(!empty($arItem['PROMO_IMG_BIG'])): ?>
                                        <div class="promo-img">
                                            <img src="<?=$arItem['PROMO_IMG_BIG']?>">
                                        </div>
                                    <? endif; ?>
                                    <div class="promo-wrap"></div>
                                    <div class="promo-desc">
                                        <? if(!empty($arItem['PROMO_DATE'])): ?>
                                            <div class="promo-date"><?=$arItem['PROMO_DATE']?></div>
                                        <? endif; ?>
                                        <div class="promo-name"><?=$arItem['NAME']?></div>
                                    </div>
                                    <? if(!empty($arItem['PROPERTIES']['age']['VALUE'])): ?>
                                        <div class="age"><?=$arItem['DISPLAY_PROPERTIES']['age']['DISPLAY_VALUE']?></div>
                                    <? endif; ?>
                                </div>
                            </a>
                        </div>
                        <? endif; ?>
                    <? endforeach; ?>
                </div>
                <? if (count($arResult["ITEMS"]) > 1): ?>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next" id="promo_button_next"></div>
                    <div class="swiper-button-prev" id="promo_button_prev"></div>
                <? endif; ?>
            </div>
        </div>
        <div class="promo-second">
            <? foreach ($arResult['ITEMS'] as $key => $arItem): ?>
                <? if($arItem['IS_PROMO_IBLOCK']): ?>
                    <div class="promo-second-line">
                        <? $url = trim($arItem['DETAIL_PAGE_URL']);
                        if(strlen($url) > 0):
                            $boolHttp = stripos($url, 'http') !== false;
                            $url = $boolHttp ? $url : 'http://' . $_SERVER['HTTP_HOST'] . $url;
                        ?>
                            <a href="<?=$url?>" <? if($boolHttp) echo 'target="_blank"'; ?>>
                        <? else: ?>
                            <span>
                        <? endif; ?>
                            <div class="promo__item">
                                <? if(!empty($arItem['PROMO_IMG_BIG']['src'])): ?>
                                    <div class="promo-img">
                                        <img src="<?=$arItem['PROMO_IMG_BIG']['src']?>">
                                    </div>
                                <? endif; ?>
                                <div class="promo-wrap"></div>
                                <div class="promo-desc">
                                    <? if(!empty($arItem['PROMO_DATE'])): ?>
                                        <div class="promo-date"><?=$arItem['PROMO_DATE']?></div>
                                    <? endif; ?>
                                    <? if(strlen(trim($arItem['NAME'])) > 0): ?>
                                        <div class="promo-name"><?=$arItem['NAME']?></div>
                                    <? endif; ?>
                                </div>
                                <? if(!empty($arItem['DISPLAY_PROPERTIES']['age']['DISPLAY_VALUE'])): ?>
                                    <div class="age"><?=$arItem['DISPLAY_PROPERTIES']['age']['DISPLAY_VALUE']?></div>
                                <? endif; ?>
                            </div>
                        <? if(strlen(trim($arItem['DETAIL_PAGE_URL'])) > 0): ?>
                            </a>
                        <? else: ?>
                            </span>
                        <? endif; ?>
                    </div>
                <? endif; ?>
            <? endforeach; ?>
        </div>

    </div>
    <div class="swip-container"> <!-- hide -->
        <div class="swiper-wrapper">
            <? foreach ($arResult['ITEMS'] as $key => $arItem): ?>
                <div class="swiper-slide">
                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>">
                        <div class="promo__item">
                            <? if(!empty($arItem['PROMO_IMG_SWIPER'])): ?>
                                <div class="promo-img">
                                    <img src="<?=$arItem['PROMO_IMG_SWIPER']?>">
                                </div>
                            <? endif; ?>
                            <div class="promo-wrap"></div>
                            <div class="promo-desc">
                                <? if(!empty($arItem['PROMO_DATE'])): ?>
                                    <div class="promo-date"><?=$arItem['PROMO_DATE']?></div>
                                <? endif; ?>
                                <div class="promo-name"><?=$arItem['NAME']?></div>
                            </div>
                            <? if(!empty($arItem['PROPERTIES']['age']['VALUE'])): ?>
                                <div class="age"><?=$arItem['DISPLAY_PROPERTIES']['age']['DISPLAY_VALUE']?></div>
                            <? endif; ?>
                        </div>
                    </a>
                </div>
            <? endforeach; ?>
        </div>
        <? if (count($arResult["ITEMS"]) > 1): ?>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <? endif; ?>
    </div>
</div>
</div>
<? endif; ?>

<script type="application/javascript">
    // свайпер на главной
    $('.swip-container').swiper({
        pagination: '.swiper-pagination',
        slidesPerView: 'auto',
        paginationClickable: true,
        spaceBetween: 10,
        loop: true,
        autoplay: 2500,
        autoplayDisableOnInteraction: false
    });

    $('.promo-swip-container').swiper({
        pagination: '.swiper-pagination',
        slidesPerView: 1,
        paginationClickable: true,
        nextButton: '#promo_button_next',
        prevButton: '#promo_button_prev',
        spaceBetween: 10,
        loop: true,
        autoplay: 2500,
        autoplayDisableOnInteraction: false
    });

</script>
