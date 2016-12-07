<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */

// получим все разделы для фильтрации
$arList = CIBlockElement::GetList(
    ['created' => 'asc'],
    ['ACTIVE' => 'Y', 'IBLOCK_ID' => $arParams['IBLOCK_ID']],
    false,
    false,
    ['ID', 'NAME', 'ACTIVE_FROM']
);
$arResult['years'] = [];
while ($ob = $arList->GetNextElement()) {
   $res = $ob->GetFields();
   $year = explode('.', explode(' ', $res['ACTIVE_FROM'])[0])[2];
   if (!in_array($year, $arResult['years'])){
       $arResult['years'][] = $year;
   }
}