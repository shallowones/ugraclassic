<?php
/**
 * Created by PhpStorm.
 * User: agr
 * Date: 6/29/16
 * Time: 1:48 PM
 */

/*Автоматическое подключение классов*/
\Bitrix\Main\Loader::registerAutoLoadClasses(null, array(
    'UW\IBBase'             => '/local/libs/base/ib.base.php',
    'UW\HLBase'             => '/local/libs/base/hl.base.php',
    'UW\SystemBase'         => '/local/libs/base/system.base.php',
    'UW\Services'           => '/local/libs/base/services.php',
    'UW\SubscribeAfisha'    => '/local/libs/events/SubscribeAfisha.php'
));

$arEvents = [];

/**
 * Регистрация обработчиков событий.
 * Примеры в /local/libs/base/examples/register.events.php
 */
\UW\SystemBase::registerHandlers($arEvents);

// для дублирования новостей коллективов
AddEventHandler("iblock", "OnBeforeIBlockElementAdd", Array("UW\\Services", "CheckDuplicateNewsForAdd"));
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("UW\\Services", "CheckDuplicateNewsForUpd"));

// для промо-блока на главной
AddEventHandler("iblock", "OnBeforeIBlockElementDelete", Array("UW\\Services", "CheckDeletePromo"));
AddEventHandler("iblock", "OnBeforeIBlockElementAdd", Array("UW\\Services", "CheckAddPromo"));
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("UW\\Services", "CheckEditPromo"));

// отписка от рассылки
AddEventHandler("subscribe", "BeforePostingSendMail", array("UW\\Services", "BeforePostingSendMailHandler"));

// копирование дат проведения в Афише
AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("UW\\Services", "CopyDatesAfisha"));
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("UW\\Services", "CopyDatesAfisha"));

// добавляем к символьному коду ID элемента (для Афиши)
AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("UW\\Services", "AddIdForCode"));
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("UW\\Services", "AddIdForCode"));

// скрываем разделы в меню в админке
AddEventHandler("main", "OnBuildGlobalMenu", Array("UW\\Services", "ASDOnBuildGlobalMenu"));

// добавление мероприятия из афиши в инфоблок рассылки
AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("UW\\SubscribeAfisha", "AddEventToIbSubscribe"));
// деактивация эхлемента в инфоблоке рассылки
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("UW\\SubscribeAfisha", "DeactivateEventSubscribe"));
// удаление эхлемента в инфоблоке рассылки
AddEventHandler("iblock", "OnBeforeIBlockElementDelete", Array("UW\\SubscribeAfisha", "DeleteEventSubscribe"));

/**
 * Распечатывает массивы
 * @param $var
 * @param int $mode
 * @param string $str
 * @param int $die
 */
function gG($var, $mode = 0, $str = 'Var', $die = 0)
{
    switch($mode){
        case 0:
            echo "<pre>";
            echo "######### {$str} ##########<br/>";
            print_r($var);
            echo "</pre>";
            if($die) die();
            break;
        case 2:
            $handle = fopen($_SERVER["DOCUMENT_ROOT"]."/upload/debug.txt", "a+");
            fwrite($handle, "######### {$str} ##########\n");
            fwrite($handle, (string)$var);
            fwrite($handle, "\n\n\n");

            fclose($handle);
            break;
    }
}

