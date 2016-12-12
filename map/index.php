<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Гастрольная карта");
?><?$APPLICATION->IncludeComponent(
	"ugraweb:wrapper.component",
	"",
	Array(
		"IBLOCK_ID" => "81",
		"IBLOCK_TYPE" => "site_visit"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>