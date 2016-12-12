<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */

$image = [];
$size = [
    'width' => 380,
    'height' => 230
];

// получим список коллективов
$arListCollectives = [];
$res = CIBlockElement::GetList(
    ['SORT' => 'ASC'],
    ['IBLOCK_CODE' => 'collective', 'ACTIVE' => 'Y'],
    false,
    false,
    ['ID', 'NAME', 'CODE']
);
while ($ob = $res->Fetch())
{
    $arListCollectives[$ob['NAME']] = [
        'ID' => $ob['ID'],
        'CODE' => $ob['CODE']
    ];
}

foreach ($arResult['ITEMS'] as $key => $arItem) {
    // получим раздел элемента
    $arSection = [];
    $arList = CIBlockElement::GetByID($arItem['ID']);
    if ($arr = $arList->Fetch()) {
        $rsSection = CIBlockSection::GetByID($arr['IBLOCK_SECTION_ID']);
        if ($arSection = $rsSection->Fetch()) {
            $arResult['ITEMS'][$key]['SECTION'] = [
                'ID' => $arSection['ID'],
                'NAME' => $arSection['NAME']
            ];
        }
    }

    // парсим дату и место проведения
    $arResult['ITEMS'][$key]['D-PLACE'] =
        strtolower(FormatDate("d F", MakeTimeStamp($arItem['PROPERTIES']['date']['VALUE'])))
        . ', ' . $arItem['PROPERTIES']['hall']['VALUE'];
    if (strpos($arResult['ITEMS'][$key]['D-PLACE'], '0') === 0) {
        $arResult['ITEMS'][$key]['D-PLACE'] = substr($arResult['ITEMS'][$key]['D-PLACE'], 1);
    }

    // обрезаем изображение
    $image = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], $size, BX_RESIZE_IMAGE_EXACT, true);
    if (!empty($image)) {
        $arResult['ITEMS'][$key]['PREVIEW_PICTURE']['SRC'] = $image['src'];
    }

    // парсим ссылку на детальную страницу
    foreach ($arListCollectives as $collectiveName => $coll) {
        if (strpos($arSection['NAME'], $collectiveName) !== false) {
            $arResult['ITEMS'][$key]['DETAIL_PAGE_URL'] =
                str_replace('#COLL_CODE#', $coll['CODE'], $arResult['ITEMS'][$key]['DETAIL_PAGE_URL']);
        }
    }
}