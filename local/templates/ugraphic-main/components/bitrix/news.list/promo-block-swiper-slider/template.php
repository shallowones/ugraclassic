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
                        <a href="<?=$arItem['DETAIL_PAGE_URL']?>">
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
                                    <div class="promo-name"><?=$arItem['NAME']?></div>
                                </div>
                                <? if(!empty($arItem['DISPLAY_PROPERTIES']['age']['DISPLAY_VALUE'])): ?>
                                    <div class="age"><?=$arItem['DISPLAY_PROPERTIES']['age']['DISPLAY_VALUE']?></div>
                                <? endif; ?>
                            </div>
                        </a>
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

<?/* if (count($arResult["ITEMS"]) > 0): ?>
    <div class="promo-block">
        <div class="promo-container">
            <? if ($arResult["ITEMS"][0]['PROMO_DISPLAY']): ?>
                <div class="promo-first">
                    <a href="<?= $arResult["ITEMS"][0]['PROMO_DISPLAY']["URL"]; ?>">
                        <div class="promo__item">
                            <? if (is_array($arResult["ITEMS"][0]['PROMO_DISPLAY']['PICTURE'])): ?>
                                <div class="promo-img">
                                    <img
                                            src="<?= $arResult["ITEMS"][0]['PROMO_DISPLAY']['PICTURE']["src"] ?>"
                                            width="<?= $arResult["ITEMS"][0]['PROMO_DISPLAY']['PICTURE']["width"] ?>"
                                            height="<?= $arResult["ITEMS"][0]['PROMO_DISPLAY']['PICTURE']["height"] ?>"
                                    />
                                </div>
                            <? endif; ?>
                            <div class="promo-wrap"></div>
                            <div class="promo-desc">
                                <? if (!empty($arResult["ITEMS"][0]['PROMO_DISPLAY']['DATE'])): ?>
                                    <div class="promo-date"><?= $arResult["ITEMS"][0]['PROMO_DISPLAY']['DATE'] ?></div>
                                <? endif; ?>
                                <? if (!empty($arResult["ITEMS"][0]['PROMO_DISPLAY']['NAME'])): ?>
                                    <div class="promo-name"><?= $arResult["ITEMS"][0]['PROMO_DISPLAY']['NAME'] ?></div>
                                <? endif; ?>
                            </div>
                            <? if (!empty($arResult["ITEMS"][0]['PROMO_DISPLAY']['AGE'])): ?>
                                <div class="age"><?= $arResult["ITEMS"][0]['PROMO_DISPLAY']['AGE'] ?></div>
                            <? endif; ?>
                        </div>
                    </a>
                </div>
            <? endif; ?>

            <? if ($arResult["ITEMS"][1]['PROMO_DISPLAY'] || $arResult["ITEMS"][2]['PROMO_DISPLAY']): ?>
                <div class="promo-second">
                    <? if ($arResult["ITEMS"][1]['PROMO_DISPLAY']): ?>
                        <div class="promo-second-line">
                            <a href="<?= $arResult["ITEMS"][1]['PROMO_DISPLAY']["URL"]; ?>">
                                <div class="promo__item">
                                    <? if (is_array($arResult["ITEMS"][1]['PROMO_DISPLAY']['PICTURE'])): ?>
                                        <div class="promo-img">
                                            <img
                                                    src="<?= $arResult["ITEMS"][1]['PROMO_DISPLAY']['PICTURE']["src"] ?>"
                                                    width="<?= $arResult["ITEMS"][1]['PROMO_DISPLAY']['PICTURE']["width"] ?>"
                                                    height="<?= $arResult["ITEMS"][1]['PROMO_DISPLAY']['PICTURE']["height"] ?>"
                                            />
                                        </div>
                                    <? endif; ?>
                                    <div class="promo-wrap"></div>
                                    <div class="promo-desc">
                                        <? if (!empty($arResult["ITEMS"][1]['PROMO_DISPLAY']['DATE'])): ?>
                                            <div class="promo-date"><?= $arResult["ITEMS"][1]['PROMO_DISPLAY']['DATE'] ?></div>
                                        <? endif; ?>
                                        <? if (!empty($arResult["ITEMS"][1]['PROMO_DISPLAY']['NAME'])): ?>
                                            <div class="promo-name"><?= $arResult["ITEMS"][1]['PROMO_DISPLAY']['NAME'] ?></div>
                                        <? endif; ?>
                                    </div>
                                    <? if (!empty($arResult["ITEMS"][1]['PROMO_DISPLAY']['AGE'])): ?>
                                        <div class="age"><?= $arResult["ITEMS"][1]['PROMO_DISPLAY']['AGE'] ?></div>
                                    <? endif; ?>
                                </div>
                            </a>
                        </div>
                    <? endif; ?>
                    <? if ($arResult["ITEMS"][2]['PROMO_DISPLAY']): ?>
                        <div class="promo-second-line">
                            <a href="<?= $arResult["ITEMS"][2]['PROMO_DISPLAY']["URL"]; ?>">
                                <div class="promo__item">
                                    <? if (is_array($arResult["ITEMS"][2]['PROMO_DISPLAY']['PICTURE'])): ?>
                                        <div class="promo-img">
                                            <img
                                                    src="<?= $arResult["ITEMS"][2]['PROMO_DISPLAY']['PICTURE']["src"] ?>"
                                                    width="<?= $arResult["ITEMS"][2]['PROMO_DISPLAY']['PICTURE']["width"] ?>"
                                                    height="<?= $arResult["ITEMS"][2]['PROMO_DISPLAY']['PICTURE']["height"] ?>"
                                            />
                                        </div>
                                    <? endif; ?>
                                    <div class="promo-wrap"></div>
                                    <div class="promo-desc">
                                        <? if (!empty($arResult["ITEMS"][2]['PROMO_DISPLAY']['DATE'])): ?>
                                            <div class="promo-date"><?= $arResult["ITEMS"][2]['PROMO_DISPLAY']['DATE'] ?></div>
                                        <? endif; ?>
                                        <? if (!empty($arResult["ITEMS"][2]['PROMO_DISPLAY']['NAME'])): ?>
                                            <div class="promo-name"><?= $arResult["ITEMS"][2]['PROMO_DISPLAY']['NAME'] ?></div>
                                        <? endif; ?>
                                    </div>
                                    <? if (!empty($arResult["ITEMS"][2]['PROMO_DISPLAY']['AGE'])): ?>
                                        <div class="age"><?= $arResult["ITEMS"][2]['PROMO_DISPLAY']['AGE'] ?></div>
                                    <? endif; ?>
                                </div>
                            </a>
                        </div>
                    <? endif; ?>
                </div>
            <? endif; ?>
        </div>

        <div class="swip-container"> <!-- hide -->
            <div class="swiper-wrapper">
                <? foreach ($arResult["ITEMS"] as $arItem): ?>
                    <? if ($arItem['PROMO_DISPLAY']): ?>
                        <div class="swiper-slide promo-slide">
                            <a href="<?= $arItem['PROMO_DISPLAY']["URL"] ?>">
                                <div class="promo__item">
                                    <? if (is_array($arItem['PROMO_DISPLAY']['PICTURE_SWIPER'])): ?>
                                        <div class="promo-img">
                                            <img src="<?= $arItem['PROMO_DISPLAY']['PICTURE_SWIPER']["src"] ?>">
                                        </div>
                                    <? endif; ?>
                                    <div class="promo-wrap"></div>
                                    <div class="promo-desc">
                                        <? if (!empty($arItem['PROMO_DISPLAY']['DATE'])): ?>
                                            <div class="promo-date"><?= $arItem['PROMO_DISPLAY']['DATE'] ?></div>
                                        <? endif; ?>
                                        <? if (!empty($arItem['PROMO_DISPLAY']['NAME'])): ?>
                                            <div class="promo-name"><?= $arItem['PROMO_DISPLAY']['NAME'] ?></div>
                                        <? endif; ?>
                                    </div>
                                    <? if (!empty($arItem['PROMO_DISPLAY']['AGE'])): ?>
                                        <div class="age"><?= $arItem['PROMO_DISPLAY']['AGE'] ?></div>
                                    <? endif; ?>
                                </div>
                            </a>
                        </div>
                    <? endif; ?>
                <? endforeach; ?>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>

<? endif; */?>
