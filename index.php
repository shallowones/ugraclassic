<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
global $APPLICATION;
$APPLICATION->SetTitle("Главная");

use Bitrix\Main\Page\Asset;

$asset = Asset::getInstance();
$asset->addCss("/index.css");
$asset->addJs('//vk.com/js/api/openapi.js?136');
$asset->addString(
    '<script>' .
    '   var v = VK.Widgets.Group("vk_groups", {' .
    '       mode: 4,' .
    '       width: "auto",' .
    '       height: "430"' .
    '   }, 8121061);' .
    '</script>',
    true,
    \Bitrix\Main\Page\AssetLocation::AFTER_JS
);

$ibEventsID 		= 	\UW\IBBase::getIBIdByCode("events");
$ibInformPartnersID	= 	\UW\IBBase::getIBIdByCode("inform_partners");
$ibNewsID 			= 	\UW\IBBase::getIBIdByCode("news");
$ibNewsCultureID 	= 	\UW\IBBase::getIBIdByCode("news_culture");
$ibCollectiveID		=	\UW\IBBase::getIBIdByCode("collective");
$ib3DpanaramID		=	\UW\IBBase::getIBIdByCode("3d-pannapams");
$ibRegionEventsID	=	\UW\IBBase::getIBIdByCode("events-regions");
$ibPartnersID		=	\UW\IBBase::getIBIdByCode("partners");

$arEnum = \CIBlockPropertyEnum::GetList(
    [],
    [
        "IBLOCK_ID"=>$ibEventsID,
        "CODE"=>"location",
        "XML_ID"=>'office'
    ]
)->GetNext();

$GLOBALS['FLT_EVENTS_LIST'] = [
    '>=DATE_ACTIVE_FROM' => date('d.m.Y'),
    '!PROPERTY_location' => $arEnum['ID']
];
?>
    <div class="content">
        <div class="promo-slider">
            <div class="wrapper">
                <? $promoFilter = array(
                    array(
                        array("PROPERTY_LOCATION" => 25), // В промо-блок
                    )
                );
                $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "slider-promo",
                    array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "ADD_SECTIONS_CHAIN" => "Y",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "N",
                        "CHECK_DATES" => "N",
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
                        "FILTER_NAME" => "promoFilter",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => $ibEventsID,
                        "IBLOCK_TYPE" => "afisha",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                        "INCLUDE_SUBSECTIONS" => "Y",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "3",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => array(
                            0 => "",
                            1 => "age",
                            2 => "date",
                            3 => "location",
                            4 => "link_kassir",
                        ),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "Y",
                        "SET_META_KEYWORDS" => "Y",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "DESC",
                        "SORT_ORDER2" => "ASC",
                        "COMPONENT_TEMPLATE" => "slider-promo",
                        "TEMPLATE_THEME" => "blue",
                        "MEDIA_PROPERTY" => "",
                        "SLIDER_PROPERTY" => "",
                        "SEARCH_PAGE" => "/search/",
                        "USE_RATING" => "N",
                        "USE_SHARE" => "N"
                    ),
                    false,
                    array(
                        "ACTIVE_COMPONENT" => "Y"
                    )
                );?>
            </div><!-- .wrapper -->
        </div><!-- .porno-slider -->


        <div class="events-block">
            <div class="wrapper">
                <h1>МЕРОПРИЯТИЯ</h1>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "slider-events",
                    array(
                        "ACTIVE_DATE_FORMAT" => "j F Y",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "CACHE_FILTER" => "Y",
                        "CACHE_GROUPS" => "N",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "CHECK_DATES" => "N",
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_DATE" => "Y",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "N",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array(
                            0 => "",
                            1 => "ACTIVE_TO",
                        ),
                        "FILTER_NAME" => "FLT_EVENTS_LIST",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => $ibEventsID,
                        "IBLOCK_TYPE" => "afisha",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "Y",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "20",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => array(
                            0 => "",
                            1 => "age",
                            2 => "date",
                            3 => "hall",
                            4 => "link_kassir",
                            5 => "date_text",
                        ),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "Y",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "ASC",
                        "SORT_ORDER2" => "ASC",
                        "COMPONENT_TEMPLATE" => "slider-events"
                    ),
                    false
                );?>
            </div><!-- .wrapper -->
        </div><!-- .events-block -->

        <div class="calendar-line">
            <div class="wrapper">
                <h1>КАЛЕНДАРЬ СОБЫТИЙ</h1>
                <?$APPLICATION->IncludeComponent('ugraweb:calendar.list','calendar-list',array('DAY_COUNT'=>120),false);?>
            </div><!-- .wrapper -->
        </div><!-- .calendar line -->


        <div class="tape-news" style="width: 1313px; margin: 0 auto;padding: 20px 35px;">
            <div class="news-one">
                <h1>Новости<br>КТЦ "Югра-Классик"</h1>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "news-col-index",
                    array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
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
                        "DISPLAY_BOTTOM_PAGER" => "N",
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
                        "IBLOCK_ID" => $ibNewsID,
                        "IBLOCK_TYPE" => "news",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "Y",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "5",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "",
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
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "DESC",
                        "SORT_ORDER2" => "ASC",
                        "COMPONENT_TEMPLATE" => "news-index",
                        "LINK_TO_NEWS" => "/news/"
                    ),
                    false
                );?>
            </div>
            <div class="news-two">
                <h1>Новости<br>культуры Югры</h1>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "news-col-index",
                    array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
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
                        "DISPLAY_BOTTOM_PAGER" => "N",
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
                        "IBLOCK_ID" => $ibNewsCultureID,
                        "IBLOCK_TYPE" => "news",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "Y",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "5",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "",
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
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "DESC",
                        "SORT_ORDER2" => "ASC",
                        "COMPONENT_TEMPLATE" => "news-index",
                        "LINK_TO_NEWS" => "/news/newsculture/"
                    ),
                    false
                );?>
            </div>
        </div>
        <?
        $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"groups-horizantal-list", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
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
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "IBLOCK_NAME",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => $ibCollectiveID,
		"IBLOCK_TYPE" => "groups",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "PHOTO_MAIN_PAGE",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ACTIVE_FROM",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC",
		"COMPONENT_TEMPLATE" => "groups-horizantal-list"
	),
	false
);?>
        <?/*
	<div class="news-groups">
		<div class="wrapper">
			<div class="news-left-box">
				<h1>НОВОСТИ</h1>

				<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"news-index", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
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
		"DISPLAY_BOTTOM_PAGER" => "N",
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
		"IBLOCK_ID" => $ibNewsID,
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "5",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
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
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"COMPONENT_TEMPLATE" => "news-index",
		"LINK_TO_NEWS" => "/news"
	),
	false
);?>

			</div>

		<div class="groups-right-box">
			<h1>КОЛЛЕКТИВЫ</h1>

			<?
			$APPLICATION->IncludeComponent(
				"bitrix:news.list", 
				"groups-list", 
				array(
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
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
					"DISPLAY_BOTTOM_PAGER" => "N",
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
					"IBLOCK_ID" => $ibGroupsID,
					"IBLOCK_TYPE" => "groups",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"INCLUDE_SUBSECTIONS" => "Y",
					"MESSAGE_404" => "",
					"NEWS_COUNT" => "20",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Новости",
					"PARENT_SECTION" => "",
					"PARENT_SECTION_CODE" => "",
					"PREVIEW_TRUNCATE_LEN" => "",
					"PROPERTY_CODE" => array(
						0 => "URL",
						1 => "",
					),
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "Y",
					"SET_META_KEYWORDS" => "Y",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SORT_BY1" => "ID",
					"SORT_BY2" => "SORT",
					"SORT_ORDER1" => "ASC",
					"SORT_ORDER2" => "ASC",
					"COMPONENT_TEMPLATE" => "groups-list"
				),
				false
			);?>

		</div>

		<div class="clrb"></div>

		</div><!-- .wrapper -->
	</div><!-- calendar line -->
*/?>

        <!--	<div class="events-box">-->
        <!--		<div class="wrapper">-->
        <!--		<h1>МЕРОПРИЯТИЯ ПО РЕГИОНУ</h1>-->
        <!---->
        <!--		--><?//$APPLICATION->IncludeComponent("bitrix:news.list", "slider-events-region", array(
        //			"ACTIVE_DATE_FORMAT" => "j F Y",
        //				"ADD_SECTIONS_CHAIN" => "N",
        //				"AJAX_MODE" => "N",
        //				"AJAX_OPTION_ADDITIONAL" => "",
        //				"AJAX_OPTION_HISTORY" => "N",
        //				"AJAX_OPTION_JUMP" => "N",
        //				"AJAX_OPTION_STYLE" => "Y",
        //				"CACHE_FILTER" => "Y",
        //				"CACHE_GROUPS" => "N",
        //				"CACHE_TIME" => "36000000",
        //				"CACHE_TYPE" => "N",
        //				"CHECK_DATES" => "Y",
        //				"DETAIL_URL" => "",
        //				"DISPLAY_BOTTOM_PAGER" => "N",
        //				"DISPLAY_DATE" => "N",
        //				"DISPLAY_NAME" => "Y",
        //				"DISPLAY_PICTURE" => "Y",
        //				"DISPLAY_PREVIEW_TEXT" => "N",
        //				"DISPLAY_TOP_PAGER" => "N",
        //				"FIELD_CODE" => array(
        //					0 => "",
        //					1 => "",
        //				),
        //				"FILTER_NAME" => "",
        //				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
        //				"IBLOCK_ID" => $ibRegionEventsID,
        //				"IBLOCK_TYPE" => "afisha",
        //				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        //				"INCLUDE_SUBSECTIONS" => "Y",
        //				"MESSAGE_404" => "",
        //				"NEWS_COUNT" => "20",
        //				"PAGER_BASE_LINK_ENABLE" => "N",
        //				"PAGER_DESC_NUMBERING" => "N",
        //				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        //				"PAGER_SHOW_ALL" => "N",
        //				"PAGER_SHOW_ALWAYS" => "N",
        //				"PAGER_TEMPLATE" => ".default",
        //				"PAGER_TITLE" => "Новости",
        //				"PARENT_SECTION" => "",
        //				"PARENT_SECTION_CODE" => "",
        //				"PREVIEW_TRUNCATE_LEN" => "",
        //				"PROPERTY_CODE" => array(
        //					0 => "age",
        //					1 => "date",
        //					2 => "hall",
        //					3 => "",
        //				),
        //				"SET_BROWSER_TITLE" => "N",
        //				"SET_LAST_MODIFIED" => "N",
        //				"SET_META_DESCRIPTION" => "Y",
        //				"SET_META_KEYWORDS" => "N",
        //				"SET_STATUS_404" => "N",
        //				"SET_TITLE" => "N",
        //				"SHOW_404" => "N",
        //				"SORT_BY1" => "ACTIVE_FROM",
        //				"SORT_BY2" => "SORT",
        //				"SORT_ORDER1" => "DESC",
        //				"SORT_ORDER2" => "ASC",
        //				"COMPONENT_TEMPLATE" => "slider-events-region"
        //			),
        //			false,
        //			array(
        //			"ACTIVE_COMPONENT" => "Y"
        //			)
        //		);?>
        <!--		</div>-->
        <!--	</div>-->


        <div class="uk-today-box"> <!-- UK today -->
            <div class="wrapper">
                <div class="ktc-today">
                    <h1>«Югра-Классик» <br/>сегодня</h1>

                    <?$APPLICATION->IncludeFile(
                        $APPLICATION->GetTemplatePath("include_areas/ktc-today.php"),
                        Array(),
                        Array("MODE"=>"html")
                    );?>
                </div>
                <img src="<?=SITE_TEMPLATE_PATH?>/img/ktc.jpg" class="ktc-photo" alt="«ЮГРА-КЛАССИК» СЕГОДНЯ" title="«ЮГРА-КЛАССИК» СЕГОДНЯ">
            </div><!-- .wrapper -->


            <div class="clrb"></div>
        </div><!-- UK today -->


        <div class="virt-tour-box"> <!-- 3d tour -->
            <div class="wrapper">

                <h1>ВИРТУАЛЬНЬIЙ ТУР</h1>

                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "3D-panarams",
                    array(
                        "ACTIVE_DATE_FORMAT" => "j F Y",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "CACHE_FILTER" => "Y",
                        "CACHE_GROUPS" => "N",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "N",
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "N",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array(
                            0 => "",
                            1 => "",
                        ),
                        "FILTER_NAME" => "",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => $ib3DpanaramID,
                        "IBLOCK_TYPE" => "groups",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "Y",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "20",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => array(
                            0 => "URL",
                            1 => "",
                            2 => "",
                            3 => "",
                            4 => "",
                        ),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "Y",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "DESC",
                        "SORT_ORDER2" => "ASC",
                        "COMPONENT_TEMPLATE" => "3D-panarams"
                    ),
                    false
                );?>

            </div>
            <!-- .wrapper -->
        </div><!-- 3d tour -->

        <div class="partners-box"> <!-- partners -->
            <div class="wrapper">
                <h1 style="">МЫ В СОЦСЕТЯХ</h1>
                <div class="social-widget">
                    <div class="social-widget__item">
                        <div id="vk_groups"></div>
                    </div>
                    <div class="social-widget__item">
                        <iframe
                            src='/local/libs/inwidget/index.php?width=600&inline=3&view=9&toolbar=false&preview=large'
                            scrolling='no'
                            frameborder='no'
                            style='border:none; width:100%; height:430px; overflow:hidden;'
                        ></iframe>
                    </div>
                </div>
            </div><!-- .wrapper -->
        </div><!-- 3d tour -->


        <div class="partners-box"> <!-- partners -->
            <div class="wrapper">

                <h1>НАШИ ПАРТНЕРЫ</h1>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "partners-carousel",
                    array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
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
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "N",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array(
                            0 => "",
                            1 => "",
                        ),
                        "FILTER_NAME" => "",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => "8",
                        "IBLOCK_TYPE" => "groups",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "Y",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "20",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => array(
                            0 => "URL",
                            1 => "",
                        ),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "Y",
                        "SET_META_KEYWORDS" => "Y",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "ID",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "ASC",
                        "SORT_ORDER2" => "ASC",
                        "COMPONENT_TEMPLATE" => "partners-list"
                    ),
                    false
                );?>


                <h1 class="m-top30">ИНФОРМАЦИОННЫЕ ПАРТНЕРЫ</h1>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "inform-partners-carousel",
                    array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
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
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "N",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array(
                            0 => "",
                            1 => "",
                        ),
                        "FILTER_NAME" => "",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => $ibInformPartnersID,
                        "IBLOCK_TYPE" => "groups",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "Y",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "20",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => array(
                            0 => "URL",
                            1 => "",
                        ),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "Y",
                        "SET_META_KEYWORDS" => "Y",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "ID",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "ASC",
                        "SORT_ORDER2" => "ASC",
                        "COMPONENT_TEMPLATE" => "partners-list"
                    ),
                    false
                );?>

            </div><!-- .wrapper -->
        </div>



    </div><!-- .content -->
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>