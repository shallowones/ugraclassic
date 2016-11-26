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