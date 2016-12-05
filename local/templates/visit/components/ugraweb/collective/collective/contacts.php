<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$sectionHome    =   "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/";
$sectionContacts    =   "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/contacts/";

$APPLICATION->AddChainItem($arParams['COL_NAME'], $sectionHome);
$APPLICATION->AddChainItem("Контакты", $sectionContacts);
$APPLICATION->SetTitle('Контакты');
echo 'Раздел находится на стадии редактирования';
?>
