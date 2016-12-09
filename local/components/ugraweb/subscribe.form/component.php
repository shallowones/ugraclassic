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

        $ID = $subscr->Add($arFields);
        if($ID > 0)
		{
            $_SESSION['SEND_SUBSCRIBE_OK'] = "ok";

            // Делаем редирект, чтобы не осталось данных в post
            LocalRedirect($APPLICATION->GetCurDir());
		}
		else
		{
            $arResult["Error"][] = 'Не удалось добавить подписчика.';
		}

        /*$CurDate = date("d.m.Y H:i:s");
        $arFields = Array(
            "IBLOCK_ID"      => 12,
            "NAME"           => $_POST["subscribe-email"],
            "CODE"			 => hash_hmac('md5', $CurDate, 'svskhmao'),
            "DATE_ACTIVE_FROM"=> $CurDate,
            "ACTIVE"         => "Y",
        );

        // Сохранение подписчика
        $obNew = new CIBlockElement;
        $bOk = false;
        $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "ACTIVE");
        $arFilter = Array("IBLOCK_ID" => 12, "=NAME" => $_POST["subscribe-email"]);
        $rsSubscribers = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

        // Если когда-то уже был подписан, то активируем
        if($obSubscribers = $rsSubscribers->GetNextElement()):
            $arField = $obSubscribers->GetFields();

            if($arField["ACTIVE"] == "Y"):
                $bOk = false;
                $arResult["Error"][] = "<span style='color:red;'>Вы уже подписаны на рассылку</span>";
            else:
                if($rsSubscriber = $obNew->Update($arField["ID"], $arFields)):
                    $bOk = true;
                else:
                    $bOk = false;
                endif;
            endif;

        // Есди нет, то создаем новую запись подписчика
        else:
            if($new_id = $obNew->Add($arFields)):
                $bOk = true;
            else:
                $bOk = false;
            endif;
        endif;

        if($bOk):
            $_SESSION['SEND_SUBSCRIBE_OK'] = "ok";

            // Делаем редирект, чтобы не осталось данных в post
            LocalRedirect(POST_FORM_ACTION_URI);
        else:
            $arResult["Error"][] = "<span style='color:red;'>Не удалось сохранить подписчика</span>";
            $arResult["subscribe-email"] = $_POST["subscribe-email"];
        endif;*/

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
if(!empty($_GET["us"]) && !empty($_GET["key"]) && CModule::IncludeModule("iblock")):
	/*$arSelect = Array("ID", "NAME", "CODE", "DATE_ACTIVE_FROM");
	$arFilter = Array("IBLOCK_ID" => 12, "ACTIVE" => "Y", "=CODE" => $_GET["key"]);
	$rsSubscribers = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	if($obSubscribers = $rsSubscribers->GetNextElement()):  
		$arFields = $obSubscribers->GetFields();
		
		$obSubscriber = new CIBlockElement;
		$arUpdates = Array(
			"IBLOCK_ID"      => 12,
			"NAME"           => $arFields["NAME"],
			"CODE"			 => $arFields["CODE"],
			"DATE_ACTIVE_FROM"=> $arFields["DATE_ACTIVE_FROM"],
			"ACTIVE"         => "N",			
		);
		
		$rsSubscriber = $obSubscriber->Update($arFields["ID"], $arUpdates);
		
		$arResult["US_MSG"] = "Вы успешно отписаны от рассылки.";
	else:
		$arResult["US_MSG"] = "Не удалось отписаться от рысслки. Возможно вы уже отписаны от нее.";
	endif;*/
endif;


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
