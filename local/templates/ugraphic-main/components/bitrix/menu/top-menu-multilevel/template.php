<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<nav class="clearfix">
	<a href="#" id="pull"></a>

<ul class="top-menu" id="top-menu-1">

<div class="search-menu">
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

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul class="falls">
		<?else:?>
			<li <?if ($arItem["SELECTED"]):?>class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a>
				<ul>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<div class="menu-clear-left"></div>
                <ul class="t-menu"></ul>
                <div class="menu-clear-left"></div>
</nav>
<?endif?>
