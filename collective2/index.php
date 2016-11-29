<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Главная");
?>
<?$APPLICATION->IncludeComponent(
	"ugraweb:collective", 
	"collective", 
	array(
		"COMPONENT_TEMPLATE" => "collective",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/collective2/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"SEF_URL_TEMPLATES" => array(
			"collective" => "#COLL_CODE#/",
			"search" => "",
			"friends" => "",
			"photos" => "",
			"messages" => "",
			"black_list" => "",
			"visitors" => "",
			"posts" => "",
			"share_success" => "",
			"settings" => "",
			"edit" => "",
			"login" => "",
			"photos_detail" => "",
			"posts_add" => "",
			"posts_detail" => "",
			"posts_edit" => "",
			"messages_detail" => "",
		)
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>