<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
LocalRedirect('/profile/'.CUser::GetID().'/');

if(!$arResult['MyProfile']) {
	$CurUser = CUser::GetID();
	LocalRedirect('/profile/'.$CurUser.'/visitors/');
}

use \UW\DataHelper as DataHelper;
$this->SetViewTarget('filter');
$GLOBALS['flt_users_list'] = $APPLICATION->IncludeComponent("ugraweb:users.filter","",Array(),false);
$this->EndViewTarget();
?>
<div class="users">
    <div class="users__c">
	<?$APPLICATION->IncludeComponent("ugraweb:users.list", "visitors", Array(
		"USER_ID" => $arResult['CURRENT_USER'],
		"GUEST_ID" => $arResult['VARIABLES']['USER_ID'],
		"HL_CODE" => DataHelper::HL_USER_VISITORS,
		"FILTER_NAME" => "flt_users_list",
		"USER_FIELD_CODE" => "UF_VISITOR_ID", // поле ID пользователя
		"ITEMS_COUNT" => "100", // сколько юзеров выводить
		"FRIEND_FOR_VISITORS" => DataHelper::HL_USER_FRIENDS
		),
		false
	);
	?>
	</div>
	<div class="users-filter">
		<?$APPLICATION->ShowViewContent('filter');?>
	</div>
</div>
