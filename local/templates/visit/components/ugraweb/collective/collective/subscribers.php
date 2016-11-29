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
<?$this->EndViewTarget();?> 
<?endif;?>

<?$APPLICATION->IncludeComponent(
    "sh:user.subscribers", 
    "subscribers", 
    array(
        'USER_ID' => $arResult['VARIABLES']['USER_ID'],
		'USER_DIR' => $GLOBALS["USER_FIELDS"]["USER_DIR"],
		'CURRENT_USER' => $arResult['CURRENT_USER'],
		'TYPE' => 'subscribers',
		'ITEM_COUNT' => '6',
    ), 
    $component
);
?>

<?if(defined("X_VIEW_FOOTER")):?>
<?$this->SetViewTarget(X_VIEW_FOOTER);?>
	<?$APPLICATION->IncludeComponent(
		"sh:user.info", 
		"info-sidebar", 
		array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_CLUBS_ID" => $arParams["IBLOCK_CLUBS_ID"],
			'CURRENT_USER' => $arResult['CURRENT_USER'],
			'USER_FIELDS' => "USER_FIELDS"
		), 
		$component
	);
	?>
<?$this->EndViewTarget();?> 
<?endif;?>