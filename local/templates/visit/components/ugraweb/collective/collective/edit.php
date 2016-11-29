<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$APPLICATION->IncludeComponent("ugraweb:profile.edit","",Array(),false);
?>

<?/*if(defined("X_VIEW_HEADER")):?>
<?$this->SetViewTarget(X_VIEW_HEADER);?>
	<?$GLOBALS["USER_FIELDS"] = $APPLICATION->IncludeComponent(
		"sh:user.header", 
		"header-settings",
		array(
			'USER_ID' => $arResult['VARIABLES']['USER_ID'],
			'CURRENT_USER' => $arResult['CURRENT_USER']
		), 
		$component
	);
	?>
<?$this->EndViewTarget();?> 
<?endif;?>

<?$APPLICATION->IncludeComponent(
    "sh:user.settings", 
    "", 
    array(
        "FORM_CODE" => "form_settings",
    ), 
    $component
);
*/?>
