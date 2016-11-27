<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<title><?$APPLICATION->ShowTitle(false);?> - КТЦ "Югра-Классик"</title>		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />

		<?
			use Bitrix\Main\Page\Asset;

			Asset::getInstance()->addCss("https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic");
			Asset::getInstance()->addCss("https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700,700italic");

			Asset::getInstance()->addJs("https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js");

			Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/jQuery.equalHeights.js");

			Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/owl-slider/owl.carousel.min.css");			
			Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/owl-slider/owl.carousel.min.js");
			
			Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/fancyapps/jquery.fancybox.pack.js");
			Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/fancyapps/jquery.fancybox.css");

			Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/main.js");
		?>
		<?$APPLICATION->ShowHead();?>
	</head>
	<body>
		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div><!-- #panel -->	

		<div id="header">
			<div class="wrapper">
				<a href="/" title="Главная страница КТЦ «Югра-Классик»">
					<div class="logo"></div>
				</a>

				<div class="head-info">
					<div>
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
						</div><!-- .social -->*/?>

						<div class="contact">
							<div class="spec-version">
								<a href="#">Версия для слабовидящих</a>
							</div>
							<span class="cont-name1">Приемная:</span> <span class="phone-one">8 3467 <b>352-535</b></span> <br/>
							<span class="cont-name2">Касса:</span> <span class="phone-two">8 3467 <b>352-550</b></span>
						</div><!-- .contact -->

						<div class="login-panel">
							<a href="/">Вход</a>
							<a href="/">Регистрация</a>
						</div><!-- .login-panel -->

					</div>

					<div>
						<div class="search-head">
							<?$APPLICATION->IncludeComponent(
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
							);?>
						</div><!-- .search-head -->
					</div>
				</div><!-- .head-info -->

				<a href="/"><div class="user-icon"></div></a>

				<div class="clrb"></div>

			</div><!-- .wrapper -->

			<div class="menu-head">
				<div class="wrapper">
					<?$APPLICATION->IncludeComponent("bitrix:menu", "top-menu-multilevel", array(
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
					);?>
				</div><!-- .wrapper -->
			</div><!-- .menu-head -->

		</div><!-- #header -->		
	
		<?if ($APPLICATION->GetCurPage() != "/index.php"):?>
			<div class="main-container"> 
				<div class="row">
						<div class="content-header">
							<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "micro-breadcrumb", Array(
								"START_FROM" => "0",
									"PATH" => "",	
									"SITE_ID" => "-",
								),
								false
							);?>
							<h1><?$APPLICATION->ShowTitle()?></h1>
						</div><!-- .content-header -->
						<div class="content">
							<?if ($APPLICATION->GetDirProperty("SHOW_RIGHT_COL") == "Y"):?>
								<div class="col-left-cont">
							<?endif?>						
		<?endif;
		/* На этой странице мы открыли 2 блока для всех страниц кроме Главной. Если необходимо показать справый сайдбар, то 4 блока.*/