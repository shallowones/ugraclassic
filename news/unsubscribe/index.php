<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отписка от рассылки");
?><?$APPLICATION->IncludeComponent(
	"ugraweb:subscribe.unsubscribe",
	"",
	Array(
		"ASD_MAIL_ID" => $_REQUEST["mid"],
		"ASD_MAIL_MD5" => $_REQUEST["mhash"]
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>