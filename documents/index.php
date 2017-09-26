<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/** @var CMain $APPLICATION */
$APPLICATION->SetTitle("Документы");
global $USER;
if (!$USER->isAdmin()) LocalRedirect('/');
?>

<? $APPLICATION->IncludeComponent(
	"ugraweb:documents", 
	"documents-template", 
	array(
		"COMPONENT_TEMPLATE" => "documents-template",
		"IBLOCK_TYPE" => "documents",
		"IBLOCK_ID" => \UW\IBBase::getIBIdByCode("docs-new"),
		"COUNT_SHOW_ELEMENTS" => "10",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/documents/",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
		)
	),
	false
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>