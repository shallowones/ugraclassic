<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$CurUser = CUser::GetID();

if(
    !$arResult['MyProfile'] ||
    intval($arResult['VARIABLES']['DIALOG_ID']) <= 0 ||
    intval($arResult['VARIABLES']['DIALOG_ID']) == $CurUser
)
    LocalRedirect('/profile/'.$CurUser.'/messages/');

$rsUser = \CUser::GetList(
    ($by='id'),($order='asc'),
    array('ID' => $arResult['VARIABLES']['DIALOG_ID']),
    array('FIELDS' => array('ID','NAME','PERSONAL_PHOTO','EMAIL'))
);

if(!$arUser = $rsUser->Fetch())
    LocalRedirect('/404.php');

$GLOBALS['DIALOG_USER'] = $arUser;
?>

<?$APPLICATION->IncludeComponent("ugraweb:messages.detail","",Array(
    'USER_ID' => $arResult['VARIABLES']['USER_ID'],
    'DIALOG_ID' => $arResult['VARIABLES']['DIALOG_ID'],
    'DIALOG_USER' => 'DIALOG_USER',
    'IS_AJAX' => 'N'
),false);?>

<?//$APPLICATION->IncludeComponent("bitrix:im.messenger","",Array(),false);?>

<?//$APPLICATION->IncludeComponent("ugraweb:im.messenger","",Array(),false);?>