<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
if(!$arResult['MyProfile']) {
    $CurUser = CUser::GetID();
    LocalRedirect('/profile/'.$CurUser.'/share-success/');
}

?>

<?$APPLICATION->SetTitle("Поделитесь своим счастьем");?>

<?
$APPLICATION->IncludeComponent("ugraweb:blogs.edit","share_success",Array(
	"IBLOCK_CODE" => "share_success"
),false);
?>
