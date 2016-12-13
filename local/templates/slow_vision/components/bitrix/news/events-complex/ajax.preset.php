<?
define("NO_KEEP_STATISTIC", true);
define("NO_AGENT_CHECK", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

use \Bitrix\Main\Application;

$obRequest = Application::getInstance()->getContext()->getRequest();
$arRequests = $obRequest->toArray();

$response = array();
$response['dateStart'] = '';
$response['dateEnd'] = '';

if($obRequest->isAjaxRequest())
{
    $currentDate = date('d.m.Y');
    $mCurrentDate = MakeTimeStamp(date('d.m.Y'));

    $nDay = date('N', $mCurrentDate);

}

echo json_encode($response);

die();