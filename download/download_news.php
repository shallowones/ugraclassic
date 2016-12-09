<?
define("NO_KEEP_STATISTIC", true);
define("NO_AGENT_CHECK", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::AddAutoloadClasses('', array(
    'UW\downloadNews'       => '/download/news.php',
));
echo UW\downloadNews::download($_REQUEST['id']);