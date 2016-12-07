<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Обратная связь");
?><?$APPLICATION->IncludeComponent(
	"ugraweb:main.feedback",
	"",
	Array(
		"EMAIL_TO" => "svs@ugraweb.ru",
		"EVENT_MESSAGE_ID" => array("7"),
		"OK_TEXT" => "Ваше сообщение отправлено!",
		"REQUIRED_FIELDS" => array("EMAIL","MESSAGE"),
		"USE_CAPTCHA" => "Y"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>