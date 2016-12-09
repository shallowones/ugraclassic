<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
    die();
}

$CurDir = $APPLICATION->GetCurDir();
$arCurDir = explode('/', $CurDir);
$bHomePage = ($CurDir == '/');

$bSubMenu = (in_array($arCurDir[1],array('about','events','mediacenter','news')));
$bDetail = intval($arCurDir[ count($arCurDir)-2 ]) > 0;

$arPage = array(
    'css' => array(
        SITE_TEMPLATE_PATH.'/css/main.css',

    ),
    'js' => array(
        SITE_TEMPLATE_PATH.'/js/main.js',
        SITE_TEMPLATE_PATH.'/js/jquery-1.12.1.min.js',
        SITE_TEMPLATE_PATH.'/js/cookie.js',
    )
);

$oAsset = \Bitrix\Main\Page\Asset::getInstance();
foreach ($arPage['css'] as $css)
{
    $oAsset->addCss($css);
}
foreach ($arPage['js'] as $js)
{
    $oAsset->addJs($js);
}

if ($_REQUEST['slow_vision'] == "N")
{
    $_SESSION['slow_vision'] = "N";
    LocalRedirect($CurDir);
}

CJSCore::Init();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title><?$APPLICATION->ShowTitle();?></title>
    <?$APPLICATION->ShowHead();?>
    <?if (!in_array($arCurDir[1],array('contacts','feedback'))){
    echo '<style>   img {    display: none;     }   </style>';
    }?>
</head>
<body >
    <div id="panel"><?$APPLICATION->ShowPanel();?></div>
    <div class="page">
        <header class="header">
            <section class="header-tool">
                <div class="wrapper clearfix">
                    <div class="tool-font"><span class="tool__label">Размер шрифта</span><a href="#" data-size="small" class="tool__size js-size tool__size_small">A</a><a href="#" data-size="normal" class="tool__size js-size tool__size_active">A</a><a href="#" data-size="big" class="tool__size js-size tool__size_big">A</a></div>
                    <div class="tool-color"><span class="tool__label tool__label_color">Цвет сайта</span><a href="#" data-color="normal" class="tool__size js-color tool__color tool__color_active">Ц</a><a href="#" data-color="black" class="tool__size js-color tool__color tool__color_black">Ц</a><a href="#" data-color="blue" class="tool__size js-color tool__color tool__color_blue">Ц</a></div>
                    <div class="tool-eye"><a href="<?=$APPLICATION->GetCurDir()?>?slow_vision=N" class="tool__label tool__label_link">Обычная версия</a></div>
                </div>
            </section>
            <section class="wrapper">
                <div class="header-logo clearfix">
                    <a href="/" class="logo__link">Югра-Классик<span class="logo__link-small"><br>Концертно-театральный центр</span></a>
                    <div class="header-info">
                        Приемная:<br />
                        <div class="info__phone">8 (3467) 325-535</div>
                    </div>
                    <div class="header-info" style="margin-right: 150px;">
                        Касса:<br />
                        <div class="info__phone">8 (3467) 325-550</div>
                    </div>
                </div>
                <nav class="menu">
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "top", array(
                        "ROOT_MENU_TYPE" => "top",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_TIME" => "3600000",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "left",
                        "USE_EXT" => "N",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N"
                    ),
                        false
                    );?>
                </nav>
                <? if(!$bHomePage && $bSubMenu): ?>
                <nav class="menu menu-sub">
                <?$APPLICATION->IncludeComponent("bitrix:menu", "right", Array(
                    "ROOT_MENU_TYPE" => "left",	// Тип меню для первого уровня
                    "MENU_CACHE_TYPE" => "Y",	// Тип кеширования
                    "MENU_CACHE_TIME" => "36000000",	// Время кеширования (сек.)
                    "MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
                    "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
                    "MAX_LEVEL" => "3",	// Уровень вложенности меню
                    "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                    "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                    "DELAY" => "N",	// Откладывать выполнение шаблона меню
                    "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                    "IS_SID" => intval($_REQUEST['sid']) > 0,
                ),
                    false
                );?>
                </nav>
                <? endif; ?>
            </section>
            <? if(!$bHomePage && defined("NEED_LEFT_MENU")): ?><section class="menu-wrap"></section><? endif; ?>
        </header>
        <section class="main">
            <div class="wrapper">
                <article class="article">
                    <? if(!$bHomePage && !defined('NOT_SHOW_HEAD') && !$bDetail): ?>
                    <h1 class="h1"><?$APPLICATION->ShowTitle();?></h1>
                    <? endif; ?>