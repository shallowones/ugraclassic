<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */

$image = [];
$size = [
    'width' => 104,
    'height' => 64
];

// добавим в arResult изображение события
foreach ($arResult['Days'] as $keyDay => $arDay) {
    if ($arDay['events']) {
        foreach ($arDay['events'] as $keyEvent => $arEvent) {
            $res = CIBlockElement::GetByID($arEvent['id']);
            if ($ar_res = $res->Fetch()) {
                if ($ar_res['PREVIEW_PICTURE']) {
                    // уменьшаем превьюшное фото
                    $image = CFile::ResizeImageGet($ar_res['PREVIEW_PICTURE'], $size, BX_RESIZE_IMAGE_EXACT, true);
                    // ставим уменьшенный формат
                    if (!empty($image)) {
                        $arResult['Days'][$keyDay]['events'][$keyEvent]['picture']['id'] = $ar_res['PREVIEW_PICTURE'];
                        $arResult['Days'][$keyDay]['events'][$keyEvent]['picture']['src'] = CFile::GetPath($ar_res['PREVIEW_PICTURE']);
                        $arResult['Days'][$keyDay]['events'][$keyEvent]['picture']['src_small'] = $image['src'];
                    }
                }
            }
        }
    }
}