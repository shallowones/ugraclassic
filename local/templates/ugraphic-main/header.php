<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
if ($_REQUEST['slow_vision'] == "Y") {
    $_SESSION['slow_vision'] = "Y";
    LocalRedirect($CurDir);
}
?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <title><? $APPLICATION->ShowTitle(false); ?> - КТЦ "Югра-Классик"</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>

        <?
        use Bitrix\Main\Page\Asset;

        Asset::getInstance()->addCss("https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic");
        Asset::getInstance()->addCss("https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700,700italic");

        Asset::getInstance()->addJs("https://hm.kassir.ru/start.js");
        Asset::getInstance()->addJs("https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js");

        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jQuery.equalHeights.js");

        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/owl-slider/owl.carousel.min.css");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/owl-slider/owl.carousel.min.js");

        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/fancyapps/jquery.fancybox.pack.js");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/fancyapps/jquery.fancybox.css");

        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/select-multiple/jquery.select-multiple.js");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/js/select-multiple/select-multiple.css");

        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/js/swiper/css/swiper.min.css");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/swiper/js/swiper.jquery.min.js");

        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/main.js");

        CJSCore::Init(array('date'));
        ?>
        <? $APPLICATION->ShowHead(); ?>
    </head>
<body>
    <div id="panel">
        <? $APPLICATION->ShowPanel(); ?>
    </div><!-- #panel -->

    <div id="header">
        <div class="wrapper">
            <a href="/" title="Главная страница КТЦ «Югра-Классик»" class="ktc-logo">
                <div class="logo"></div>
            </a>

            <div class="head-info">
                <div class="head-1">
                    <?/*<div class="social">
							<a href="https://www.facebook.com/pages/Концертно-театральный-Центр-Югра-Классик/439242576105852" title="">
								<div class="fb"></div>
							</a>

							<a href="https://vk.com/club8121061" title="">
								<div class="vk"></div>
							</a>

							<a href="https://twitter.com/Ugra_Classic" title="">
								<div class="tw"></div>
							</a>

							<a href="https://www.youtube.com/channel/UC3YYsQ9U0QZUIXsFpucu32A/videos" title="">
								<div class="yt"></div>
							</a>
						</div><!-- .social -->

						<div class="contact">
							<span class="cont-name1">Приемная:</span> <br><span class="phone-one">8 3467 <b>352-535</b></span> <br/>
							<span class="cont-name2">Касса:</span> <br><span class="phone-two">8 3467 <b>352-550</b></span>
						</div><!-- .contact -->*/ ?>
                    <div class="conts">
                        <div class="conts-row">
                            <div class="conts__item">
                                <div class="dsc">Приемная:</div>
                                <div class="nmb">8 3467 <span>352-550</span></div>
                            </div>
                            <div class="conts__item">
                                <div class="dsc">Касса:</div>
                                <div class="nmb">
                                    <div class="nmb-first">8 3467 <span>352-535</span></div>
                                    <div class="nmb-second">8 3467 <span>352-564</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="conts-row">
                            <div class="conts__item soc">
                                <div class="dsc">Соцсети:</div>
                                <a href="https://vk.com/club8121061" target="_blank">
                                    <div class="soc-vk"></div>
                                </a>
                                <a href="https://www.instagram.com/ugra_classic86/" target="_blank">
                                    <div class="soc-insta"></div>
                                </a>
                                <a href="https://www.facebook.com/ugraclassic/" target="_blank">
                                    <div class="soc-fb"></div>
                                </a>
                            </div>
                            <div class="conts__item conts-time">
                                <div class="dsc">Время работы:</div>
                                <div class="dsc">ПН-ПТ <span>09:00-19:00</span> <i>(без перерыва)</i></div>
                                <div class="dsc">СБ-ВС <span>11:00-19:00</span> <i>(перерыв 13:00-14:00)</i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="head-2">
                    <div class="spec-version">
                        <a href="?slow_vision=Y">Версия для слабовидящих</a>
                    </div>
                    <div class="search-head">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:search.title",
                            "top-search",
                            Array(
                                "CATEGORY_0" => "",
                                "CATEGORY_0_TITLE" => "",
                                "CHECK_DATES" => "N",
                                "COMPONENT_TEMPLATE" => "visual",
                                "CONTAINER_ID" => "title-search",
                                "CONVERT_CURRENCY" => "N",
                                "INPUT_ID" => "title-search-input",
                                "NUM_CATEGORIES" => "1",
                                "ORDER" => "date",
                                "PAGE" => "#SITE_DIR#search/index.php",
                                "PREVIEW_TRUNCATE_LEN" => "",
                                "PRICE_CODE" => "",
                                "PRICE_VAT_INCLUDE" => "Y",
                                "SHOW_INPUT" => "Y",
                                "SHOW_OTHERS" => "N",
                                "SHOW_PREVIEW" => "Y",
                                "TOP_COUNT" => "5",
                                "USE_LANGUAGE_GUESS" => "Y"
                            )
                        ); ?>
                    </div><!-- .search-head -->
                </div>
            </div><!-- .head-info -->

            <a href="javascript:void(0)" class="magnifier">
                <div class="magnifier-icon"></div>
            </a>

            <div class="clrb"></div>

            <div class="search-menu">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:search.title",
                    "top-search",
                    Array(
                        "CATEGORY_0" => "",
                        "CATEGORY_0_TITLE" => "",
                        "CHECK_DATES" => "N",
                        "COMPONENT_TEMPLATE" => "visual",
                        "CONTAINER_ID" => "title-search",
                        "CONVERT_CURRENCY" => "N",
                        "INPUT_ID" => "title-search-input",
                        "NUM_CATEGORIES" => "1",
                        "ORDER" => "date",
                        "PAGE" => "#SITE_DIR#search/index.php",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PRICE_CODE" => "",
                        "PRICE_VAT_INCLUDE" => "Y",
                        "SHOW_INPUT" => "Y",
                        "SHOW_OTHERS" => "N",
                        "SHOW_PREVIEW" => "Y",
                        "TOP_COUNT" => "5",
                        "USE_LANGUAGE_GUESS" => "Y"
                    )
                ); ?>
            </div><!-- .search-head -->
        </div><!-- .wrapper -->

        <div class="menu-head">
            <div class="wrapper">
                <? $APPLICATION->IncludeComponent("bitrix:menu", "top-menu-multilevel", array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "left",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "2",
                    "MENU_CACHE_GET_VARS" => "",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "N",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "top",
                    "USE_EXT" => "N",
                    "COMPONENT_TEMPLATE" => "top-menu-multilevel",
                    "MENU_THEME" => "site"
                ),
                    false,
                    array(
                        "ACTIVE_COMPONENT" => "Y"
                    )
                ); ?>
            </div><!-- .wrapper -->
        </div><!-- .menu-head -->

    </div><!-- #header -->

<? if ($APPLICATION->GetCurPage() != "/index.php"): ?>
    <div class="main-container">
    <div class="row">
    <div class="content-header">
        <? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "micro-breadcrumb", Array(
            "START_FROM" => "0",
            "PATH" => "",
            "SITE_ID" => "-",
        ),
            false
        ); ?>
        <h1><? $APPLICATION->ShowTitle() ?></h1>
    </div><!-- .content-header -->
    <div class="content">
    <? if ($APPLICATION->GetDirProperty("SHOW_RIGHT_COL") == "Y"): ?>
    <div class="col-left-cont">
<?endif ?>
<?endif;
/* На этой странице мы открыли 2 блока для всех страниц кроме Главной. Если необходимо показать справый сайдбар, то 4 блока.*/