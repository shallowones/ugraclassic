<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$sectionHome    =   "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/";
$sectionContacts    =   "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/o-nas/";

$APPLICATION->AddChainItem($arParams['COL_NAME'], $sectionHome);
$APPLICATION->AddChainItem("О нас", $sectionContacts);
$APPLICATION->SetTitle('О нас');
echo 'Раздел находится на стадии редактирования';
?>
