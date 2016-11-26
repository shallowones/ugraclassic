<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Главная");

use Bitrix\Main\Page\Asset;
Asset::getInstance()->addCss("/index.css");

$ibEventsID 		= 	\UW\IBBase::getIBIdByCode("events");
$ibNewsID 			= 	\UW\IBBase::getIBIdByCode("news");
$ibGroupsID			=	\UW\IBBase::getIBIdByCode("groups");
$ib3DpanaramID		=	\UW\IBBase::getIBIdByCode("3d-pannapams");
$ibRegionEventsID	=	\UW\IBBase::getIBIdByCode("events-regions");
$ibPartnersID		=	\UW\IBBase::getIBIdByCode("partners");

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
			4 => "",
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
		"COMPONENT_TEMPLATE" => "slider-events"
	),
	false
);?>
		</div><!-- .wrapper -->
	</div><!-- .events-block -->


	<div class="calendar-line">
		<div class="wrapper">
			<h1>КАЛЕНДАРЬ СОБЫТИЙ</h1>
            <?
            $asset = Asset::getInstance();
            $asset->addJs(SITE_TEMPLATE_PATH . '/js/swiper/js/swiper.jquery.min.js');
            $asset->addCss(SITE_TEMPLATE_PATH . '/js/swiper/css/swiper.min.css');
            $asset->addCss(SITE_TEMPLATE_PATH . '/css/events-calendar.css');

            $event1 = [
                [
                    'time' => '10:30',
                    'title' => '«Жемчужины барокко: ария antik»',
                    'link' => '#'
                ],
                [
                    'time' => '19:30',
                    'title' => '«Любовь. Собак@ Точка.RU»',
                    'link' => '#'
                ]
            ];
            $event2 = [
                [
                    'time' => '19.00',
                    'title' => 'Шедевры барокко',
                    'link' => '#'
                ],
                [
                    'time' => '18.00',
                    'title' => '«Лики Моцарта: мифы, фантазии и реальность»',
                    'link' => '#'
                ],
                [
                    'time' => '17.00',
                    'title' => 'Алиса в стране чудес',
                    'link' => '#'
                ]
            ];
            $event3 = [
                [
                    'time' => '19.00',
                    'title' => 'Celtic rhythm',
                    'link' => '#'
                ]
            ];
            ?>
            <div class="events">
                <div class="swiper-container events-container">
                    <div class="swiper-wrapper events-wrapper">
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_month">Июнь</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>20</b> пн</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>21</b> вт</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day events-item_day_event" data-events="<?= htmlspecialchars(json_encode($event1)); ?>"><b>22</b> ср</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day events-item_day_event" data-events="<?= htmlspecialchars(json_encode($event2)); ?>"><b>23</b> чт</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day events-item_day_event" data-events="<?= htmlspecialchars(json_encode($event2)); ?>"><b>24</b> пт</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>25</b> сб</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>26</b> вс</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>27</b> пн</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_month">Июль</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>1</b> вт</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>2</b> ср</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>3</b> чт</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>4</b> пт</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>5</b> сб</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>6</b> вс</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>7</b> пн</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_month">Август</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>8</b> вт</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>9</b> ср</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>10</b> чт</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>11</b> пт</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>12</b> сб</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>13</b> вс</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>14</b> пн</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_month">Сентябрь</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>15</b> вт</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day events-item_day_event" data-events="<?= htmlspecialchars(json_encode(array_merge($event2, $event1))); ?>"><b>16</b> ср</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>17</b> чт</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>18</b> пт</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>19</b> сб</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>20</b> вс</div>
                        </div>
                        <div class="swiper-slide events-slide">
                            <div class="events-item events-item_day"><b>21</b> пн</div>
                        </div>
                    </div>
                </div>

                <div class="swiper-button-prev events-button events-button_prev"></div>
                <div class="swiper-button-next events-button events-button_next"></div>
            </div>
            <script>
                (function ($) {
                    'use strict';

                    $(function () {
                        var $body = $('body');
                        // попап который будет отображаться при клике на событие
                        var $popup = $('<div class="event-popup"></div>');
                        // событие в календаре
                        var $event = $('.events-item_day_event');
                        var eventActiveClass = 'events-item_day_active';
                        var template = '' +
                            '<div class="event-popup__item">' +
                            '   <div class="event-popup__time">{{time}}</div>' +
                            '   <div class="event-popup-title"><a href="{{link}}" class="event-popup__link">{{title}}</a></div>' +
                            '</div>';

                        function removePopup () {
                            $popup.remove();
                            $event.removeClass(eventActiveClass);
                        }

                        // задаем body position: relative, чтобы попап центрировался относительно него
                        $body.css({
                            position: 'relative'
                        });

                        // инициализация swiper
                        $('.swiper-container').swiper({
                            slidesPerView: 'auto',
                            nextButton: '.swiper-button-next',
                            prevButton: '.swiper-button-prev',
                            onSliderMove: removePopup
                        });

                        // убиваем попап при клике вне его области
                        $(this).on("click", function(e) {
                            var $target = $(e.target);
                            // убиваем попап если клинкули не по нему или не по событию
                            if ($target.closest($event).length === 0 && $target.closest($popup).length === 0) {
                                removePopup();
                            }
                        });

                        // показываем попап по клику на событие
                        $event.click(function (e) {
                            var $this = $(this);
                            /** @var {Array} events список событий*/
                            var events;
                            var offset;
                            var items = '';

                            e.preventDefault();
                            if ($this.hasClass(eventActiveClass)) {
                                return false;
                            }
                            // попап может быть только один поэтому удаляем экземпляры в DOM
                            $popup.remove();

                            $event.removeClass(eventActiveClass);
                            $this.addClass(eventActiveClass);

                            events = $this.data('events');
                            // если это не массив или он пустой, то ничего и не делаем
                            if (!$.isArray(events) || !events.length) {
                                return false;
                            }

                            events.forEach(function (event) {
                                items += template
                                    .replace('{{time}}', event.time)
                                    .replace('{{link}}', event.link || '#')
                                    .replace('{{title}}', event.title);
                            });

                            // получаем координаты где отображать попап
                            offset = $this.offset();
                            offset.top += $this.height() + 1;

                            $popup
                                .html(items)
                                .css(offset)
                                .show()
                                .appendTo($body);
                        });
                    });
                } (jQuery));
            </script>
		</div><!-- .wrapper -->
	</div><!-- .calendar line -->



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


	<div class="events-box"> <!-- calendar line -->
		<div class="wrapper">

		<h1>МЕРОПРИЯТИЯ ПО РЕГИОНУ</h1>

		<?$APPLICATION->IncludeComponent("bitrix:news.list", "slider-events-region", array(
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
				"IBLOCK_ID" => $ibRegionEventsID,
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
					0 => "age",
					1 => "date",
					2 => "hall",
					3 => "",
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
				"COMPONENT_TEMPLATE" => "slider-events-region"
			),
			false,
			array(
			"ACTIVE_COMPONENT" => "Y"
			)
		);?>
		</div><!-- .wrapper -->
	</div><!-- .calendar line -->


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

		<h1>НАШИ ПАРТНЕРЫ</h1>
		<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"partners-list", 
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

		</div><!-- .wrapper -->
	</div><!-- 3d tour -->

</div><!-- .content -->
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>