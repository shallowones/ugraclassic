<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("SHOW_RIGHT_COL", "N");
$APPLICATION->SetTitle("Архив спецпроектов");
?>
<? $APPLICATION->IncludeComponent('ugraweb:wrapper.component','official-events-archive',[],false); ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>