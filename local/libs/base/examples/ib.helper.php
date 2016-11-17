<?php

namespace UW;

use \Bitrix\Main\Loader;

/**
 * Вспомогательный класс для работы с Инфоблоками.
 *
 * Class IBHelper
 * @package UW
 */
class IBHelper extends \UW\IBBase
{
    /**
     * Код Инфоблока "Мой инфоблок"
     */
    const IB_CODE_MY_IBLOCK = 'my_iblock';
    const IB_CODE_EVENTS = 'events';

    /**
     * Код раздела инфоблока "Мой раздел"
     */
    const IB_SECTION_CODE_MY_SECTION = 'my_section';

    /**
     * Код элемента инфоблока "Мой элемент"
     */
    const IB_ELEMENT_CODE_MY_ELEMENT = 'my_element';

    /**
     * Код свойства инфоблока "Мое свойство"
     */
    const IB_PROP_CODE_MY_PROP = 'MY_PROP';

    /**
     * Справочник значений, доступен только на чтение.
     * Скрыт внутри класса.
     * @var array
     */
    private static $_myList = [
        'key1' => 'value1',
        'key2' => 'value2',
        'key3' => 'value3',
    ];

    /**
     * Метод, для получения "скрытого" справочника
     * @return array
     */
    public static function getMyListValues()
    {
        return self::$_myList;
    }

    /**
     * Определение собственного метода
     * @param $param1
     * @param $param2
     */
    public static function myOwnFunction($param1, $param2)
    {
    }
}