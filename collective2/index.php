<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Главная");

use Bitrix\Main\Page\Asset;
Asset::getInstance()->addCss("/collective/kontsertnyy-orkestr-yugry/index.css");

$ibEventsID 		= 	\UW\IBBase::getIBIdByCode("events_kontsertnyy-orkestr-yugry");
$ibNewsID 			= 	\UW\IBBase::getIBIdByCode("news_collective");
$ibPhotogalID		=	\UW\IBBase::getIBIdByCode("photogal_kontsertnyy-orkestr-yugry");

$colName 			= 	\UW\Services::GetSiteParam('NAME');
$sectionVis 		= 	\UW\Services::GetNameSectionVis();
?>
<?$APPLICATION->IncludeComponent(
	"ugraweb:collective", 
	"collective", 
	array(
		"COMPONENT_TEMPLATE" => "collective",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/{$sectionVis}/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"IB_NEWS" => $ibNewsID,
        "IB_EVENTS" => $ibEventsID,
        "IB_PHOTOGAL" => $ibPhotogalID,
		"COL_NAME" => $colName,
		"SEF_URL_TEMPLATES" => array(
			"collective" => "#COLL_CODE#/",
			"news" => "#COLL_CODE#/news/",
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