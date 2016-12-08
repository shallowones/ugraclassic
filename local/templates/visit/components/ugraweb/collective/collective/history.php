<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$idColl        =   \UW\Services::GetCollectiveID($arParams['IB_HISTORY']);
$sectionHome   =   "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/";
$sectionOnas   =   "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/o-nas/";
$sectionHistory   =   "{$arResult['FOLDER']}{$arResult['VARIABLES']['COLL_CODE']}/o-nas/history/";

$APPLICATION->AddChainItem($arParams['COL_NAME'], $sectionHome);
$APPLICATION->AddChainItem("О нас", $sectionOnas);
$APPLICATION->AddChainItem("История", $sectionHistory);
$APPLICATION->SetTitle("История");
?>
<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "history-section",
    array(
        "ACTIVE_DATE_FORMAT" => "j F Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => $arParams['IB_HISTORY'],
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
        "PAGER_TITLE" => "Вакансии",
        "PARENT_SECTION" => $idColl,
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
            0 => "",
            1 => "date",
            2 => "",
        ),
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "Y",
        "SHOW_404" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC",
        "COMPONENT_TEMPLATE" => "news-index",
        "LINK_TO_NEWS" => "/collective/kontsertnyy-orkestr-yugry/news/"
    ),
    false
);?>