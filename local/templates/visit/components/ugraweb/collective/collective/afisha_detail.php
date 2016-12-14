<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$elementID      =   $arResult['VARIABLES']['ELEMENT_ID'];
$sectionHome    =   "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/";
if ($_GET['archive']) {
    $name = 'Архив афиши';
    $sectionEvents = "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/afisha_archive/";
}else{
    $name = 'Афиша';
    $sectionEvents = "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/afisha/";
}
$APPLICATION->AddChainItem($arParams['COL_NAME'], $sectionHome);
$APPLICATION->AddChainItem($name, $sectionEvents);
?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "events-detail",
    Array(
        "DISPLAY_DATE" => "N",
        "DISPLAY_NAME" => "N",
        "DISPLAY_PICTURE" => "N",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "USE_SHARE" => "N",
        "AJAX_MODE" => "N",
        "IBLOCK_TYPE" => "site_visit",
        "IBLOCK_ID" => $arParams['IB_EVENTS'],
        "ELEMENT_ID" => $elementID,
        "ELEMENT_CODE" => "",
        "CHECK_DATES" => "N",
        "FIELD_CODE" => array('PREVIEW_PICTURE', 'ACTIVE_TO'),
        "PROPERTY_CODE" => array(
            0 => "",
            1 => "date",
            2 => "hall",
            3 => "duration",
            4 => "cost",
            5 => "info",
            6 => "age",
            7 => "",
        ),
        "IBLOCK_URL" => "",
        "DETAIL_URL" => "",
        "SET_TITLE" => "Y",
        "SET_CANONICAL_URL" => "N",
        "SET_BROWSER_TITLE" => "N",
        "BROWSER_TITLE" => "-",
        "SET_META_KEYWORDS" => "N",
        "META_KEYWORDS" => "-",
        "SET_META_DESCRIPTION" => "N",
        "META_DESCRIPTION" => "-",
        "SET_LAST_MODIFIED" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "ADD_ELEMENT_CHAIN" => "N",
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "USE_PERMISSIONS" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_NOTES" => "",
        "CACHE_GROUPS" => "Y",
        "PAGER_TEMPLATE" => ".default",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "PAGER_TITLE" => "Афиша",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "SET_STATUS_404" => "N",
        "SHOW_404" => "N",
        "MESSAGE_404" => "",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N"
    ),
    $component
);?>

<p><br /><a href="<?=$sectionEvents?>">Вернуться к списку</a></p>