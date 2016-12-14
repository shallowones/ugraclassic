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
    <div class="promo-block wrapper">
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

        <div class="swiper-container"> <!-- hide -->
            <div class="swiper-wrapper">
                <? foreach ($arResult["ITEMS"] as $arItem): ?>
                    <? if ($arItem['PROMO_DISPLAY']): ?>
                        <div class="swiper-slide">
                            <a href="<?= $arItem['PROMO_DISPLAY']["URL"] ?>">
                                <div class="promo__item">
                                    <? if (is_array($arItem['PROMO_DISPLAY']['PICTURE_SWIPER'])): ?>
                                        <div class="promo-img">
                                            <img
                                                    src="<?= $arItem['PROMO_DISPLAY']['PICTURE_SWIPER']["src"] ?>"
                                                    width="<?= $arItem['PROMO_DISPLAY']['PICTURE_SWIPER']["width"] ?>"
                                                    height="<?= $arItem['PROMO_DISPLAY']['PICTURE_SWIPER']["height"] ?>"
                                            />
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
<? endif; ?>