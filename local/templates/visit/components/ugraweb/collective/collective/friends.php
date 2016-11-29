<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
if(!$arResult['MyProfile']) {
    $CurUser = CUser::GetID();
    LocalRedirect('/profile/'.$CurUser.'/friends/');
}

//$GLOBALS['flt_users_list']['PERSONAL_GENDER'] = 'F'; // женский

use \UW\DataHelper as DataHelper;
$this->SetViewTarget('filter');
$GLOBALS['flt_users_list'] = $APPLICATION->IncludeComponent("ugraweb:users.filter","",Array(),false);
$this->EndViewTarget();?>
<div class="users">
	<div class="users__c">
		<?
		$APPLICATION->IncludeComponent("ugraweb:users.list", "friends", Array(
			"USER_ID" => \CUser::GetID(),
				"HL_CODE" => DataHelper::HL_USER_FRIENDS,
				"FILTER_NAME" => "flt_users_list",
				"USER_FIELD_CODE" => "UF_FRIEND_USER_ID", // поле ID пользователя
				"ITEMS_COUNT" => "100" // сколько юзеров выводить
			),
			false
		);
		?>
	</div>
	<div class="users-filter">
		<?$APPLICATION->ShowViewContent('filter');?>
	</div>
</div>
