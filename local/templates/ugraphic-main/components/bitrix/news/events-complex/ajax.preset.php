<?
define("NO_KEEP_STATISTIC", true);
define("NO_AGENT_CHECK", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

use \Bitrix\Main\Application;

$obRequest = Application::getInstance()->getContext()->getRequest();
$arRequests = $obRequest->toArray();

$preset = trim(htmlspecialcharsbx($arRequests['preset']));

$response = array();
$response['dateStart'] = '';
$response['dateEnd'] = '';

if($obRequest->isAjaxRequest())
{
    $currentDate = date('d.m.Y');
    $arCD = explode('.', $currentDate);
    $mCurrentDate = MakeTimeStamp(date('d.m.Y'));

    $nDay = date('N', $mCurrentDate);
    $nPlus = 7 - $nDay;

    $nDayMonth = date('t', $mCurrentDate);
    $nPlusMonth = $nDayMonth - $arCD[0];

    if($preset == 'this_week')
    {
        $response['dateStart'] = $currentDate;

        $response['dateEnd'] = date('d.m.Y',
            mktime(0,0,0,
                intval($arCD[1]),
                intval($arCD[0])+$nPlus,
                intval($arCD[2])
            )
        );
    }
    if($preset == 'this_month')
    {
        $response['dateStart'] = $currentDate;

        $arDS = explode('.', $response['dateStart']);

        $response['dateEnd'] = date('d.m.Y',
            mktime(0,0,0,
                intval($arCD[1]),
                intval($arCD[0])+$nPlusMonth,
                intval($arCD[2])
            )
        );
    }
    if($preset == 'next_month')
    {
        $response['dateStart'] = date('d.m.Y',
            mktime(0,0,0,
                intval($arCD[1]),
                intval($arCD[0])+$nPlusMonth+1,
                intval($arCD[2])
            )
        );

        $arDS = explode('.', $response['dateStart']);
        $nDayMonthNext = date('t', MakeTimeStamp($response['dateStart']));

        $response['dateEnd'] = date('d.m.Y',
            mktime(0,0,0,
                intval($arDS[1]),
                intval($arDS[0])+$nDayMonthNext-1,
                intval($arDS[2])
            )
        );
    }
}

echo json_encode($response);

die();