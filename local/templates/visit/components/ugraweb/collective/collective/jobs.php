<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$sectionHome    =   "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/";
$sectionOnas   =   "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/o-nas/";
$sectionJobs   =   "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/o-nas/jobs/";

$APPLICATION->AddChainItem($arParams['COL_NAME'], $sectionHome);
$APPLICATION->AddChainItem("О нас", $sectionOnas);
$APPLICATION->AddChainItem("Вакансии", $sectionJobs);
$APPLICATION->SetTitle("Вакансии");

echo 'Раздел находится на стадии наполнения.';
