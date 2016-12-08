<?
define("NO_KEEP_STATISTIC", true);
define("NO_AGENT_CHECK", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::AddAutoloadClasses('', array(
    'UW\downloadPhoto'       => '/download/download.php',
));
echo UW\downloadPhoto::download($_REQUEST['id']);