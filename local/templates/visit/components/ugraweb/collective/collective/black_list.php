<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$APPLICATION->SetTitle('Черный список');
if(!$arResult['MyProfile']) {
	$CurUser = CUser::GetID();
	LocalRedirect('/profile/'.$CurUser.'/black-list/');
}

use \UW\DataHelper as DataHelper;
?>
<div class="users">
	<div class="users__c">
	<?
	$APPLICATION->IncludeComponent("ugraweb:users.list", "black-list", Array(
		"USER_ID" => \CUser::GetID(),
			"HL_CODE" => DataHelper::HL_USER_BLACK_LIST,
			"FILTER_NAME" => "",
			"USER_FIELD_CODE" => "UF_BLOCKED_USER_ID", // поле ID пользователя
			"ITEMS_COUNT" => "20" // сколько юзеров выводить
		),
		false
	);
	?>
	</div>
</div>