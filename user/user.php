<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мой профиль");
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:main.profile",
	"",
	Array(
		"SET_TITLE" => "Y", 
	)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>