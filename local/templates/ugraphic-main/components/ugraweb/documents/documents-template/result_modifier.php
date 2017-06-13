<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */

// запись расширения файла и его размера
foreach ($arResult['ITEMS'] as $key => $arItem) {
    if (strripos($arItem['LINK'], 'upload/iblock')) {
        $arResult['ITEMS'][$key]['FILE_TYPE'] = substr($arItem['LINK'], strripos($arItem['LINK'], '.') + 1);
        $arResult['ITEMS'][$key]['FILE_SIZE'] = fileSizeConvert(filesize($_SERVER['DOCUMENT_ROOT'] . $arItem['LINK']));
    }
}

function fileSizeConvert($bytes)
{
    $bytes = floatval($bytes);
    $arBytes = [
        [
            'UNIT' => 'мб',
            'VALUE' => pow(1024, 2)
        ],
        [
            'UNIT' => 'кб',
            'VALUE' => 1024
        ],
        [
            'UNIT' => 'б',
            'VALUE' => 1
        ],
    ];

    $result = '';
    foreach ($arBytes as $arItem) {
        if ($bytes >= $arItem['VALUE']) {
            $result = $bytes / $arItem['VALUE'];
            $result = strval(round($result, 2)) . ' ' . $arItem['UNIT'];
            break;
        }
    }
    return $result;
}