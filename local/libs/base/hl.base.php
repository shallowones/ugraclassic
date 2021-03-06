<?php
/**
 * Created by PhpStorm.
 * User: agr
 * Date: 6/29/16
 * Time: 1:19 PM
 */

namespace UW;

use \Bitrix\Highloadblock\HighloadBlockTable;

/**
 * Базовый класс, содержащий вспомогательные методы работы с HighloadBlock
 * Class HLBase
 * @package UW
 */
class HLBase
{
    /**
     * Инициализирует Highload-сущность на основании ее названия
     *
     * @param $name
     * @return bool|string
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\SystemException
     * @throws \Exception
     */
    final public static function initByCode($name)
    {
        /*
        $params = array(
            'filter' => array(
                '=NAME' => $name
            )
        );
        $hlblock = HighloadBlockTable::getRow($params);
        if (!$hlblock['ID']) {
            throw new \Exception('Не верное имя сущности');
        }
        return HighloadBlockTable::compileEntity($hlblock)->getDataClass();
        */

        $hlBlock = HighloadBlockTable::getList(array(
            'select' => array('ID'),
            'filter' => array('=NAME' => $name)
        ))->fetch();

        if (!$hlBlock['ID']) {
            throw new \Exception('Не верное имя сущности');

            return false;
        }


        $hlData = HighloadBlockTable::getById($hlBlock['ID'])->fetch();
        $hlClass = $hlData['NAME'] . 'Table';

        HighloadBlockTable::compileEntity($hlData);

        return $hlClass;
    }
}

