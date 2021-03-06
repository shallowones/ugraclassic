<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$APPLICATION->IncludeComponent(
    "bitrix:search.page",
    "icons",
    array(
        "AJAX_MODE" => "Y",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "Y",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DEFAULT_SORT" => "rank",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_TOP_PAGER" => "Y",
        "FILTER_NAME" => "",
        "NO_WORD_LOGIC" => "N",
        "PAGER_SHOW_ALWAYS" => "Y",
        "PAGER_TEMPLATE" => "",
        "PAGER_TITLE" => "Результаты поиска",
        "PAGE_RESULT_COUNT" => "50",
        "RESTART" => "Y",
        "SHOW_WHEN" => "N",
        "SHOW_WHERE" => "N",
        "USE_LANGUAGE_GUESS" => "Y",
        "USE_SUGGEST" => "N",
        "USE_TITLE_RANK" => "Y",
        "arrFILTER" => array(
            0 => "main",
            1 => "iblock_news",
            2 => "iblock_photo",
            3 => "iblock_afisha",
            4 => "iblock_peoples",
            5 => "iblock_documents",
            6 => "iblock_site_visit",
        ),
        "arrWHERE" => "",
        "COMPONENT_TEMPLATE" => "icons",
        "SHOW_ITEM_TAGS" => "Y",
        "TAGS_INHERIT" => "Y",
        "SHOW_ITEM_DATE_CHANGE" => "Y",
        "SHOW_ORDER_BY" => "Y",
        "SHOW_TAGS_CLOUD" => "N",
        "STRUCTURE_FILTER" => "structure",
        "NAME_TEMPLATE" => "",
        "SHOW_LOGIN" => "Y",
        "arrFILTER_main" => array(
            0 => "/collective/mlada/",
            1 => "",
        ),
        "arrFILTER_iblock_news" => array(
            0 => "11",
        ),
        "arrFILTER_iblock_photo" => array(
            0 => "12",
            1 => "13",
        ),
        "arrFILTER_iblock_afisha" => array(
            0 => "10",
        ),
        "arrFILTER_iblock_peoples" => array(
            0 => "15",
            1 => "16",
        ),
        "arrFILTER_iblock_documents" => array(
            0 => "14",
        ),
        "arrFILTER_iblock_site_visit" => array(
            0 => "all",
        )
    ),
    false
);?>