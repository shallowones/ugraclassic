<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/** @var array $arParams */
/** @var array $arResult */

$image = [];
$size = [
    'width' => 226,
    'height' => 200
];

foreach($arResult["ITEMS"] as $key => $arItem) {
    // уменьшаем изображение
    $image = CFile::ResizeImageGet($arItem['PROPERTIES']['PHOTO_MAIN_PAGE']['VALUE'], $size, BX_RESIZE_IMAGE_EXACT, true);
    if (!empty($image)) {
        $arResult["ITEMS"][$key]['PREVIEW_PICTURE']['SRC'] = $image['src'];
    }
}