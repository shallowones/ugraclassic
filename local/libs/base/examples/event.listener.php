<?php
/**
 * Created by PhpStorm.
 * User: agr
 * Date: 6/30/16
 * Time: 12:22 PM
 */

namespace Example;

/**
 * Класс содержит методы для обработки различных событий
 *
 */
class EventListener
{
    /**
     * Обработка события OnBeforeIBlockElementAdd модуля iblock
     * @param array &$arFields
     */
    public static function OnBeforeIBlockElementAdd($arFields)
    {
        /**
         * Обработка события
         */
    }

    /**
     * Обработка события CustomEvent
     * @param Event $event
     */
    public static function CustomEventHendler(Event $event)
    {
        /**
         * Обработка события
         */
    }
}