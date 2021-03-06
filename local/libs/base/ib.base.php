<?php
/**
 * Created by PhpStorm.
 * User: agr
 * Date: 6/29/16
 * Time: 1:14 PM
 */

namespace UW;

use \Bitrix\Main\Loader;

/**
 * Базовый класс, содержащий вспомогательные методы работы с IBlock
 * Class IBBase
 * @package UW
 */
class IBBase
{

    /**
     * Получает ID Инфоблока на основании его кода
     * @param $code
     * @return bool
     * @throws \Bitrix\Main\LoaderException
     * @throws \Exception
     */
    final public static function getIBIdByCode($code)
    {
        Loader::includeModule('iblock');

        $arIBlock = \CIBlock::GetList([],["CODE" => $code])->Fetch();
        if (!$arIBlock['ID']) {
            throw new \Exception('Не найден инфоблок с кодом: ' . $code);

            return false;
        }

        return $arIBlock['ID'];
    }

    /**
     * Получает ID раздела Инфоблока на основании его кода
     * @param $sectionCode
     * @param bool $iblockID
     * @return bool
     * @throws \Exception
     */
    final public static function getSectionIdByCode($sectionCode, $iblockID = false)
    {
        $arFilter = ['CODE' => $sectionCode];
        $arOrder = [];
        $arSelect = ['ID'];

        if($iblockID)
            $arFilter['IBLOCK_ID'] = intval($iblockID);

        $arSection = \CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect)->Fetch();
        if (!$arSection['ID']) {
            throw new \Exception('Не найден раздел с кодом: ' . $sectionCode);

            return false;
        }

        return $arSection['ID'];
    }

    /**
     * Получает ID элемента Инфоблока на основании его кода
     * @param $elementCode
     * @param bool $iblockID
     * @return bool
     * @throws \Exception
     */
    final public static function getElementIdByCode($elementCode, $iblockID = false)
    {
        $arSelect = ['ID'];
        $arFilter = ['CODE' => $elementCode];
        $arOrder = [];

        if($iblockID)
            $arFilter['IBLOCK_ID'] = intval($iblockID);

        $arItem = \CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
        if (!$arItem['ID']) {
            throw new \Exception('Не найден раздел с кодом: ' . $elementCode);

            return false;
        }

        return $arItem['ID'];
    }
}