<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if ($arResult['VARIABLES']['USER_ID'] == \CUser::GetID())
{
	$APPLICATION->IncludeComponent("ugraweb:blogs.edit","",Array(),false);
}
else
{
	LocalRedirect("/profile/{$arResult['VARIABLES']['USER_ID']}/posts/");
}
?>