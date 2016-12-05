<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$sectionHome    =   "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/";
$sectionOnas   =   "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/o-nas/";
$sectionHistory   =   "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/o-nas/history/";

$APPLICATION->AddChainItem($arParams['COL_NAME'], $sectionHome);
$APPLICATION->AddChainItem("О нас", $sectionOnas);
$APPLICATION->AddChainItem("История", $sectionHistory);

echo 'Раздел находится на стадии наполнения.';
