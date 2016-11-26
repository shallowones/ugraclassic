<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$rsYears = CIBlockSection::GetList(
    ['NAME'=>'DESC'],
    ['IBLOCK_ID'=>$arParams['IBLOCK_ID'],'ACTIVE'=>'Y'],
    false,
    ['IBLOCK_ID','ID','NAME']
);

while ($arYear = $rsYears->GetNext())
{
    $arResult['DOC_YEARS'][] = $arYear;
}
