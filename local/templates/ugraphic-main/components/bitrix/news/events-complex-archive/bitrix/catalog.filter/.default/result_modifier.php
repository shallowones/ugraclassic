<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */

// получим все разделы для фильтрации
$sectionList = CIBlockSection::GetList(
    ['created' => 'asc'],
    ['ACTIVE' => 'Y', 'IBLOCK_ID' => $arParams['IBLOCK_ID']],
    false,
    ['ID', 'NAME'],
    false
);
while ($res = $sectionList->Fetch()) {
    if (!empty($_GET['sections']) && $res['ID'] == $_GET['sections']) {
        $arResult['SECTIONS'][] = [
            'ID' => $res['ID'],
            'NAME' => $res['NAME'],
            'SELECTED' => true
        ];
        $arResult['CHECK_GET'] = true;
    } else {
        $arResult['SECTIONS'][] = $res;
    }
}

// получим 6 месяцев для фильтрации (нынешний + 5 месяцев назад)
$arResult['MONTHS'][0]['DATE'] = date("m.Y");
$arResult['MONTHS'][0]['NAME'] = FormatDate("f", MakeTimeStamp(date("d.m.Y")));
for ($i = 1; $i < 6; $i++) {
    $dateSTR = '-' . $i . ' month';
    $arResult['MONTHS'][$i]['DATE'] = date("m.Y", strtotime($dateSTR));
    $arResult['MONTHS'][$i]['NAME'] = FormatDate("f", MakeTimeStamp(date("d.m.Y", strtotime($dateSTR))));
}