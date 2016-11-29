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
            LocalRedirect('/profile/'.$CurUser.'/photos/');

        // если текущий пользователь сам не входит в группу активированных
        if(!in_array($arGroup['ID'], CUser::GetUserGroupArray()))
            LocalRedirect('/profile/'.CUser::GetID().'/');
    }
}

if(\UW\UserHelper::isModerator())
    $ProfileBlock = false;
else
    $ProfileBlock = \UW\RegisteredUser::CheckBlackList($arResult['VARIABLES']['USER_ID'], $arResult['CURRENT_USER']);

if ($arResult['MyProfile'])
{
    $APPLICATION->SetTitle("Мои фотографии");
}
else
{
    $APPLICATION->SetTitle("Фотографии");
}
?>
<div class="photos">
<?if(((!$ProfileBlock && !$arResult['MyProfile']) || $arResult['MyProfile'])) {?>

    <div class="photos-info">
        <? if($arResult['MyProfile']): ?>
        <a href="#" class="photos-info__i m-fl_r add_album add">Создать альбом</a>
        <? endif; ?>
        <span class="photos-info__i">Все фотографии</span>
    </div>
    <div style="clear: both"></div>

    <?if($arResult['MyProfile']):?>
        <?// Создание новых фото?>
        <?$APPLICATION->IncludeComponent(
            "ugraweb:photos.new",
            "",
            Array(
                "IBLOCK_ID" => "7",
            ),
            false
        );?>
    <?endif?>

    <?$SIDS = $APPLICATION->IncludeComponent(
        "ugraweb:albums.list",
        "",
        Array(
            "VIEW_MODE" => "LINE",
            "SHOW_PARENT_NAME" => "Y",
            "IBLOCK_TYPE" => "photos",
            "IBLOCK_ID" => "7",
            "SECTION_ID" => $_REQUEST["SECTION_ID"],
            "SECTION_CODE" => "",
            "SECTION_URL" => "",
            "COUNT_ELEMENTS" => "Y",
            "TOP_DEPTH" => "2",
            "SECTION_FIELDS" => array(),
            "SECTION_USER_FIELDS" => array(),
            "ADD_SECTIONS_CHAIN" => "Y",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "36000000",
            "CACHE_NOTES" => "",
            "CACHE_GROUPS" => "Y",
            "USER_ID" => $arResult['VARIABLES']['USER_ID'],
            'MY_PROFILE' => $arResult['MyProfile']
        )
    );?>

    <?
    if(count($SIDS) > 0) {
        $GLOBALS['flt_photos_user']['SECTION_ID'] = $SIDS;

    ?>

    <?$APPLICATION->IncludeComponent(
        "ugraweb:photos.list",
        "",
        Array(
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "AJAX_MODE" => "N",
            "IBLOCK_TYPE" => "photos",
            "IBLOCK_ID" => "7",
            "NEWS_COUNT" => "20",
            "SORT_BY1" => "ACTIVE_FROM",
            "SORT_ORDER1" => "DESC",
            "SORT_BY2" => "SORT",
            "SORT_ORDER2" => "ASC",
            "FILTER_NAME" => "flt_photos_user",
            "FIELD_CODE" => array(0=>'DETAIL_PICTURE'),
            "PROPERTY_CODE" => array(0=>'LIKE'),
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "SET_TITLE" => "Y",
            "SET_BROWSER_TITLE" => "Y",
            "SET_META_KEYWORDS" => "Y",
            "SET_META_DESCRIPTION" => "Y",
            "SET_STATUS_404" => "N",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
            "ADD_SECTIONS_CHAIN" => "Y",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "INCLUDE_SUBSECTIONS" => "Y",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "360",
            "CACHE_NOTES" => "",
            "CACHE_FILTER" => "Y",
            "CACHE_GROUPS" => "Y",
            "PAGER_TEMPLATE" => ".default",
            "DISPLAY_TOP_PAGER" => "N",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "PAGER_TITLE" => "Новости",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "AJAX_OPTION_HISTORY" => "N",
            "IS_ALBUM" => 'N',
            'MY_PROFILE' => $arResult['MyProfile'],
            "IS_MODERATOR" => \UW\UserHelper::isModerator()
        ),
        false
    );?>
    <?} else {?>
        <p>У вас пока нет фотографий.<p>
    <?}?>

    <div style="display: none;">
        <div class="box-modal" id="album_add_form">
            <div class="box-modal_close arcticmodal-close">X</div>
                <?$APPLICATION->IncludeComponent("ugraweb:albums.add","",Array(
                    "IBLOCK_ID" => "7",
                    "USER_ID" => $arResult['VARIABLES']['USER_ID']
                ),false);?>
        </div>
    </div>
    <script>
    $(function()
    {
        $(".add_album").on('click',function(e)
        {
            $('#album_add_form').arcticmodal();
            e.preventDefault();
        }
        );

    }
    );
    </script>

<?} else {?>
    <div style="background-color: #f2f2f2; padding: 10px;">
        Пользователь заблокировал доступ к анкете
    </div>
<?}?>
</div>
<br clear="all">
<br />