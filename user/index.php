<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

if (isset($_REQUEST["backurl"]) && strlen($_REQUEST["backurl"])>0) 
	LocalRedirect($backurl);

$APPLICATION->SetTitle("Авторизация");
?>
<?
// Получаем данные о пользователе
$rsUser = CUser::GetByID($USER->GetID());
$arUser = $rsUser->Fetch();?>
Здравствуйте, <?if ($arUser["NAME"] != '') echo $arUser["NAME"]; else echo $arUser["LOGIN"];?>!<br /><br />

<a href='user.php'>Редактировать профиль</a>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>