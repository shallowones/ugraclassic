<?php
/**
 * Created by PhpStorm.
 * User: agr
 * Date: 6/29/16
 * Time: 1:48 PM
 */

/*Автоматическое подключение классов*/
\Bitrix\Main\Loader::registerAutoLoadClasses(null, array(
    'UW\IBBase'         => '/local/libs/base/ib.base.php',
    'UW\HLBase'         => '/local/libs/base/hl.base.php',
    'UW\SystemBase'     => '/local/libs/base/system.base.php',
    'UW\Services'     => '/local/libs/base/services.php'
));

$arEvents = [];

/**
 * Регистрация обработчиков событий.
 * Примеры в /local/libs/base/examples/register.events.php
 */
\UW\SystemBase::registerHandlers($arEvents);

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