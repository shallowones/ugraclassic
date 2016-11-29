<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
if(!$arResult['MyProfile']) {
    $CurUser = CUser::GetID();
    LocalRedirect('/profile/'.$CurUser.'/messages/');
}
?>


<?$APPLICATION->IncludeComponent("ugraweb:messages.list","",Array(
    'USER_ID' => $arResult['VARIABLES']['USER_ID'],
),false);?>


<?//$APPLICATION->IncludeComponent("bitrix:im.messenger","",Array(),false);?>
<?//$APPLICATION->IncludeComponent("ugraweb:im.messenger","",Array(),false);?>