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
<div class="panaram3d-box">
    <div class="owl-carousel owl-theme panaram3d-partner">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <? $slide = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width' => 100, 'height' => 100), BX_RESIZE_IMAGE_EXACT, true); ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <a href="<?= $arItem["DISPLAY_PROPERTIES"]["URL"]["~VALUE"] ?>"
               alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>">
                <div id="<?= $this->GetEditAreaId($arItem['ID']); ?>" class="slider-partner__item">
                    <img src="<?= $slide["src"] ?>" alt="">
                </div>
            </a>
        <? endforeach; ?>
    </div>
</div>
<script>
    var owl = $('.panaram3d-partner');
    owl.owlCarousel({
        //loop: true,
        nav: true,
        margin: 10,
        dots: true,
        autoplay: false,
        autoplayTimeout: 15000,
        autoplayHoverPause: true,
        smartSpeed: 500,
        navText: ["<i></i>", "<i></i>"],
        responsive: {
            0: {
                items: 1,
                mouseDrag: false
            },
            500: {
                items: 2,
                mouseDrag: false
            },
            680: {
                items: 3,
                mouseDrag: false
            },
            1000: {
                items: 4,
                mouseDrag: false
            },
            1400: {
                items: 6,
                mouseDrag: false
            }
        }
    });

</script>