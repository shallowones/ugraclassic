<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
// Если не мой профиль
if(!$arResult['MyProfile']) {
	// определяем группу прошедших модерацию анкет
	$rsGroups = CGroup::GetList(($field = "c_sort"), ($f_order = "desc"), Array("STRING_ID" => 'user_moder'));
	if ($arGroup = $rsGroups->Fetch()) {
		// проверяем активирована ли анкета
		$CurUser = \CUser::GetID();
		$rsU = CUser::GetList(
			($by = 'id'), ($order = 'asc'),
			array('ID' => $arResult['VARIABLES']['USER_ID'], 'GROUPS_ID' => array($arGroup['ID'])),
			array('FIELDS' => array('ID'))
		);
		if(!$arU = $rsU->Fetch())
			LocalRedirect('/profile/'.$CurUser.'/posts/');

		// если текущий пользователь сам не входит в группу активированных
		if(!in_array($arGroup['ID'], CUser::GetUserGroupArray()))
			LocalRedirect('/profile/'.CUser::GetID().'/');
	}
}

if(\UW\UserHelper::isModerator())
    $ProfileBlock = false;
else
    $ProfileBlock = \UW\RegisteredUser::CheckBlackList($arResult['VARIABLES']['USER_ID'], $arResult['CURRENT_USER']);
?>

<?if(((!$ProfileBlock && !$arResult['MyProfile']) || $arResult['MyProfile'])) {?>

<?
$GLOBALS['blogsFilter'] = Array("PROPERTY_AUTHOR_ID" => $arResult['VARIABLES']['USER_ID']);
$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"posts", 
	array(
		"COMPONENT_TEMPLATE" => "posts",
		"IBLOCK_TYPE" => "lists",
		"IBLOCK_ID" => "1",
		"NEWS_COUNT" => "2",
		"USE_SEARCH" => "N",
		"USE_RSS" => "N",
		"USE_RATING" => "N",
		"USE_CATEGORIES" => "N",
		"USE_REVIEW" => "N",
		"USE_FILTER" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"CHECK_DATES" => "Y",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/blogs/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "86400",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_TITLE" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_ELEMENT_CHAIN" => "N",
		"USE_PERMISSIONS" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"USE_SHARE" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"LIST_ACTIVE_DATE_FORMAT" => "j F Y в H:i",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "AUTHOR_ID",
			1 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"DISPLAY_NAME" => "Y",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_PROPERTY_CODE" => array(
			0 => "AUTHOR_ID",
			1 => "",
		),
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"DETAIL_URL" => "/profile/{$arResult['VARIABLES']['USER_ID']}/posts/#ELEMENT_ID#/",
		"FILTER_NAME" => "blogsFilter",
		"MY_PROFILE" => $arResult["MyProfile"],
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "LIKE",
			1 => "",
		),
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y"
	),
	false
);?>

<?} else {?>
    <div style="background-color: #f2f2f2; padding: 10px;">
        Пользователь заблокировал доступ к анкете
    </div>
<?}?>
