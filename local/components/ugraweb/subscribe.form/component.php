<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
// form
global $USER, $APPLICATION;
$arResult = Array();

\Bitrix\Main\Loader::includeModule('subscribe');

// Если отправили форму
if($_SERVER["REQUEST_METHOD"] == "POST" && strlen($_POST["submit"]) > 0 && CModule::IncludeModule("iblock") )
{
	
	// Проверка на заполнение полей
	$arResult["Error"] = Array();

	if(strlen($_POST["subscribe-email"]) < 4)
	{
		$arResult["Error"][] = "Не введен E-MAIL";
    }
	if(strlen($_POST["subscribe-email"]) > 1 && !check_email($_POST["subscribe-email"]))
	{
		$arResult["Error"][] = "Неверно указан E-MAIL";
    }
    if(count($_POST['subscribe-rubric']) < 1)
	{
        $arResult["Error"][] = "Не выбрана ни одна рубрика";
	}
	
	// Если есть ошибки, то возвращаем уже заполненные поля
	if (count($arResult["Error"]) > 0)
	{
	
		$arResult["subscribe-email"] = htmlspecialcharsEx($_POST["subscribe-email"]);
        $arResult["'subscribe-rubric"] = $_POST['subscribe-rubric'];
		
	// Если успешная проверка, то сохраняем подписчика
    }
	else
	{
        $arFields = Array(
            "USER_ID" => ($USER->IsAuthorized()? $USER->GetID():false),
            "FORMAT" => 'html',
            "EMAIL" => htmlspecialcharsEx($_POST["subscribe-email"]),
            "ACTIVE" => "Y",
            "RUB_ID" => $_POST['subscribe-rubric'],
			"SEND_CONFIRM" => 'Y'
        );

        $subscr = new CSubscription;

        $boolSuccess = false;
        $arFindSubscr = CSubscription::GetList([],["EMAIL" => htmlspecialcharsEx($_POST["subscribe-email"])])->Fetch();
        if($arFindSubscr['ID'])
        {
            $arUpd = [
                "ACTIVE"=>'Y',
                "RUB_ID" => $_POST['subscribe-rubric'],
                "SEND_CONFIRM" => 'Y',
                'CONFIRMED' => 'N'
            ];
            if($subscr->Update($arFindSubscr['ID'], $arUpd))
            {
                $boolSuccess = true;
                CSubscription::ConfirmEvent($arFindSubscr['ID']);
            }
        }
        else
        {
            $ID = $subscr->Add($arFields);
            if($ID > 0)
            {
                $boolSuccess = true;
            }
        }
        if($boolSuccess)
        {
            $_SESSION['SEND_SUBSCRIBE_OK'] = "ok";

            // Делаем редирект, чтобы не осталось данных в post
            LocalRedirect($APPLICATION->GetCurDir());
        }
        else
        {
            $arResult["Error"][] = 'Не удалось добавить подписчика.';
        }
    }

}

// ?ID=5&CONFIRM_CODE=sRGZpYld
// Подтвердить подписку
if(intval($_GET["ID"]) > 0 && !empty($_GET["CONFIRM_CODE"]))
{
	$boolConfirm = false;

    $ID = intval($_GET["ID"]);
    $CONFIRM_CODE = trim(htmlspecialcharsEx($_GET["CONFIRM_CODE"]));
    $subscr = new CSubscription;

    $rsS = CSubscription::GetByID($ID);
    if($arSubscr = $rsS->Fetch())
	{
		if($arSubscr['CONFIRM_CODE'] == $CONFIRM_CODE)
		{
            if($subscr->Update($ID, array("CONFIRMED"=>'Y')))
			{
                $boolConfirm = true;
			}
		}
    }

    if($boolConfirm)
	{
        $_SESSION['SEND_SUBSCRIBE_CONFIRM'] = "Вы успешно подтвердили подписку.";
    }
    else
	{
        $_SESSION['SEND_SUBSCRIBE_CONFIRM'] = "Не удалось подтвердить попдиску.";
	}

    LocalRedirect($APPLICATION->GetCurDir());
}


// Отписаться от новостей
// http://ugraclassic.probitrix.com/news/unsubscribe/


$arOrder = Array("SORT"=>"ASC", "NAME"=>"ASC");
$arFilter = Array("ACTIVE"=>"Y", "LID"=>LANG);
$rsRubric = CRubric::GetList($arOrder, $arFilter);
$arRubrics = array();
while($arRubric = $rsRubric->GetNext())
{
    $arResult["RUBRIC_LIST"][] = $arRubric;
}

$this->IncludeComponentTemplate();

?>
