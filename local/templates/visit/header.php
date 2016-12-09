<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();

$codeSite = \UW\Services::GetCodeSite();
$sectionVis = \UW\Services::GetNameSectionVis();
$arSiteParam = \UW\Services::GetSiteParam(['NAME', 'PROPERTY_LOGO_VALUE', 'PROPERTY_CONTACTS_VALUE', 'PROPERTY_FOOTER_NAME_VALUE']);
$colName = $arSiteParam['NAME'];
$colLogo = $arSiteParam['PROPERTY_LOGO_VALUE'];
$colContacts = $arSiteParam['PROPERTY_CONTACTS_VALUE'];
$colFtrName = strlen($arSiteParam['PROPERTY_FOOTER_NAME_VALUE']) > 0 ? $arSiteParam['PROPERTY_FOOTER_NAME_VALUE'] : $colName;
$_SESSION['slow_vision'] = "N";
?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <title><? $APPLICATION->ShowTitle(false); ?> - <?= $colName ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>

        <?
        use Bitrix\Main\Page\Asset;

        Asset::getInstance()->addCss("https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic");
        Asset::getInstance()->addCss("https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700,700italic");

        Asset::getInstance()->addJs("https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js");

        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jQuery.equalHeights.js");

        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/owl-slider/owl.carousel.min.css");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/owl-slider/owl.carousel.min.js");

        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/fancyapps/jquery.fancybox.pack.js");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/fancyapps/jquery.fancybox.css");
        ?>
        <? $APPLICATION->ShowHead(); ?>
    </head>
<body>
    <div id="panel">
        <? $APPLICATION->ShowPanel(); ?>
    </div><!-- #panel -->

    <div id="header">
        <div class="wrapper">

            <div class="head-info">
                <? echo htmlspecialcharsback($colContacts['TEXT']) ?>
            </div><!-- .head-info -->


            <a href="/<? echo $sectionVis ?>/<? echo $codeSite ?>/" title="Главная страница - <? echo $colName ?>">
                <? if (intval($colLogo) < 1): ?>
                    <div class="logo"><? echo $colName ?></div>
                <? else: ?>
                    <div class="logo" style="background: url('<? echo CFile::GetPath($colLogo) ?>') no-repeat 0 0"></div>
                <? endif; ?>
            </a>

            <div class="search-ktc-right">

                <a href="/">
                    <div class="to-back">На сайт КТЦ</div>
                </a>
                <div class="clrb"></div>

                <div class="search-head">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:search.title",
                        "top-search",
                        array(
                            "CATEGORY_0" => array(),
                            "CATEGORY_0_TITLE" => "",
                            "CHECK_DATES" => "N",
                            "COMPONENT_TEMPLATE" => "top-search",
                            "CONTAINER_ID" => "title-search",
                            "CONVERT_CURRENCY" => "N",
                            "INPUT_ID" => "title-search-input",
                            "NUM_CATEGORIES" => "1",
                            "ORDER" => "date",
                            "PAGE" => "#SITE_DIR#" . $sectionVis . "/" . $codeSite . "/search/",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "PRICE_CODE" => array(),
                            "PRICE_VAT_INCLUDE" => "Y",
                            "SHOW_INPUT" => "Y",
                            "SHOW_OTHERS" => "N",
                            "SHOW_PREVIEW" => "Y",
                            "TOP_COUNT" => "5",
                            "USE_LANGUAGE_GUESS" => "Y",
                            "PREVIEW_WIDTH" => "75",
                            "PREVIEW_HEIGHT" => "75"
                        ),
                        false
                    ); ?>
                </div><!-- .search-head -->
            </div>

            <div class="clrb"></div>

        </div><!-- .wrapper -->

        <div class="menu-head">
            <div class="wrapper">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "top-menu-multilevel",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "left",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "2",
                        "MENU_CACHE_GET_VARS" => array(),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "collective",
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
<? if ($APPLICATION->GetCurDir() != "/" . $sectionVis . "/" . $codeSite . "/"): ?>
    <div class="main-container">
    <div class="row">
    <div class="content-header">
        <? $APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "micro-breadcrumb",
            array(
                "START_FROM" => "2",
                "PATH" => "",
                "SITE_ID" => "s1",
                "COMPONENT_TEMPLATE" => "micro-breadcrumb"
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
