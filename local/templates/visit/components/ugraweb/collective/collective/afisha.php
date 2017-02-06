<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$elementID      =   $arResult['VARIABLES']['ELEMENT_ID'];
$sectionHome    =   "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/";
$sectionEventsArchive    =   "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/afisha_archive/";
$sectionEventsNew    =   "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/afisha/";


$APPLICATION->AddChainItem($arParams['COL_NAME'], $sectionHome);
$APPLICATION->AddChainItem("Афиша");
?>

    <h4><a href="<?=$sectionEventsArchive?>">Прошедшие события</a></h4><br>
<?
$GLOBALS['arFiltAfAr'] = [
    '>DATE_ACTIVE_FROM' => date('d.m.Y').' 00:00:01',
];
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "events-section",
    array(
        "ACTIVE_DATE_FORMAT" => "j F Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "Y",
        "FILTER_NAME" => "arFiltAfAr",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "N",
        "CHECK_DATES" => "N",
        "DETAIL_URL" => "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/afisha/#ELEMENT_ID#/",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_DATE" => "N",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
            0 => "",
            1 => "age",
            2 => "date",
            3 => "hall",
            4 => "duration",
            5 => "cost",
            6 => "",
        ),
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => $arParams['IB_EVENTS'],
        "IBLOCK_TYPE" => "site_visit",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "10",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "visual",
        "PAGER_TITLE" => "Афиша",
        "PARENT_SECTION" => \UW\Services::GetCollectiveID($arParams['IB_EVENTS']),
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
            0 => "",
            1 => "age",
            2 => "date",
            3 => "hall",
            4 => "",
        ),
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "Y",
        "SHOW_404" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "ASC",
        "COMPONENT_TEMPLATE" => "events-service-complex-list",
        "LINK_TO_NEWS" => "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/afisha/"
    ),
    $component,
    array(
        "ACTIVE_COMPONENT" => "Y"
    )
);?>