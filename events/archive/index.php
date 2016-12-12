<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("SHOW_RIGHT_COL", "N");
$APPLICATION->SetTitle("Архив афиши");
?>
<? $APPLICATION->IncludeComponent('ugraweb:wrapper.component','events-archive',[],false); ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>