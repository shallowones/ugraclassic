<?
global $APPLICATION;
$dir = $APPLICATION->GetCurDir();
$arDir = explode('/', $dir);
$CODE_SITE = $arDir[2];

$aMenuLinks = Array(
	Array(
		"Главная",
        $CODE_SITE."/index.php",
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"О нас",
        $CODE_SITE."/o-nas/",
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Афиша",
        $CODE_SITE."/afisha/",
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Новости",
        $CODE_SITE."/news/",
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Контакты",
        $CODE_SITE."/contacts/",
		Array(), 
		Array(), 
		"" 
	)
);
?>