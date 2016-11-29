<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);


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


if(((!$ProfileBlock && !$arResult['MyProfile']) || $arResult['MyProfile'])) {

$arRequest = \Bitrix\Main\Application::getInstance()->getContext()->getRequest()->toArray();
if ($arRequest)
{
	$bAjaxLike = $arRequest['AJAX_LIKE'] ? "Y" : "";
	if ($bAjaxLike)
	{
		$APPLICATION->RestartBuffer();
		$bLike = \UW\RegisteredUser::AddLikeToElement($arRequest['id']);
		echo $bLike;
		die();
	}
	$bAjaxOpen = $arRequest['AJAX_OPEN'] ? "Y" : "";
	if ($bAjaxOpen)
	{
		$APPLICATION->RestartBuffer();
		$APPLICATION->IncludeComponent("ugraweb:complain.form","",Array(
            "TYPE" => $arRequest['OBJ'],
			"ELEMENT_ID" => $arRequest['ID']
		),false);
		die();
	}
	$bAjax = $arRequest['AJAX'] ? "Y" : "";
	if ($bAjax)
	{
		$APPLICATION->RestartBuffer();
		$APPLICATION->IncludeComponent("ugraweb:complain.form","",Array(
            "TYPE" => $arRequest['OBJ'],
			"REQUEST" => $arRequest,
			"AJAX" => "Y",
		),false);
		die();
	}
}
?>


<div class="diary-detail">
<?$ElementID = $APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"posts",
	Array(
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"IBLOCK_TYPE" => 'lists',
		"IBLOCK_ID" => 1,
		"FIELD_CODE" => Array("CREATED_BY"),
		"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"META_KEYWORDS" => $arParams["META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
		"BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
		"SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"FILE_404" => $arParams["FILE_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
		"ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
		"PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"ELEMENT_ID" => $arResult["VARIABLES"]["POST_ID"],
		"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"USE_SHARE" => $arParams["USE_SHARE"],
		"SHARE_HIDE" => $arParams["SHARE_HIDE"],
		"SHARE_TEMPLATE" => $arParams["SHARE_TEMPLATE"],
		"SHARE_HANDLERS" => $arParams["SHARE_HANDLERS"],
		"SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
		"SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
		"ADD_ELEMENT_CHAIN" => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : ''),
        'MY_PROFILE' => $arResult['MyProfile']
	),
	$component
);?>
	<? if ($arResult['MyProfile']):
		$APPLICATION->SetTitle("Мои дневники");
	else:
		$APPLICATION->SetTitle("Дневники");
	endif;?>

<?
$APPLICATION->IncludeComponent("ugraweb:comments","",
	Array(
		"ITEM_ID" => $ElementID,
		"IBLOCK_ID" => 4,
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => 86400
	),
	false
);?>
</div>
<div style="display: none;">
    <div class="box-modal" id="complain_form">
        <div class="box-modal_close arcticmodal-close">X</div>
		
	</div>
</div>
<script>
$(function()
{
	$(".add_complain").on('click',function(e)
	{
		var uid = $(this).data('uid');
		var obj = $(this).data('obj');

		$.ajax({
			type: "POST",
			url: "<?=$APPLICATION->GetCurDir()?>",
			data: {
				AJAX_OPEN: "Y",
				ID: uid,
                OBJ: obj
			},
			success: function (data)
			{
				$(".complain__form").detach();
				$(data).appendTo($("#complain_form"));
				$("#complain_form").arcticmodal();
			}
		});
		e.preventDefault();
	}
	);
}
);
</script>
<?
/*
<p><a href="<?=$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"]?>"><?=GetMessage("T_NEWS_DETAIL_BACK")?></a></p>
*/ ?>

<?} else {?>
    <div style="background-color: #f2f2f2; padding: 10px;">
        Пользователь заблокировал доступ к анкете
    </div>
<?}?>
