<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if(defined("X_VIEW_HEADER")):?>
<?$this->SetViewTarget(X_VIEW_HEADER);?>
	<?$GLOBALS["USER_FIELDS"] = $APPLICATION->IncludeComponent(
		"sh:user.header", 
		"", 
		array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_POST_ID" => $arParams["IBLOCK_POST_ID"],
			'USER_ID' => $arResult['VARIABLES']['USER_ID'],
			'CURRENT_USER' => $arResult['CURRENT_USER']
		), 
		$component
	);
	?>
	<?$APPLICATION->IncludeComponent(
		"sh:calendar.list", 
		"calendar-list", 
		array(
			'CURRENT_USER' => $arResult['VARIABLES']['USER_ID'],
			'DAY_COUNT' => "84",
			'CLUB_ID' => "",
		), 
		$component
	);
	?>
<?$this->EndViewTarget();?> 
<?endif;?>

<?if(defined("X_VIEW_FOOTER")):?>
<?$this->SetViewTarget(X_VIEW_FOOTER);?>
	<?$APPLICATION->IncludeComponent(
		"sh:user.info", 
		"events-sidebar", 
		array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_CLUBS_ID" => $arParams["IBLOCK_CLUBS_ID"],
			'CURRENT_USER' => $arResult['CURRENT_USER'],
			'USER_FIELDS' => "USER_FIELDS",
		), 
		$component
	);
	?>
<?$this->EndViewTarget();?> 
<?endif;?>

<?$APPLICATION->IncludeComponent(
    "sh:posts.list", 
    "events", 
    array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_POST_ID" => $arParams["IBLOCK_POST_ID"],
		"TYPE" => "event",
		"CLUB_ID" => "",
		"CLUB_NAME" => "",
		'CLUB_DETAIL_URL' => "",
		'USER_ID' => $arResult['VARIABLES']['USER_ID'],
		'SHOW_EVENT' => $_GET["f"]
    ), 
    $component
);
?>