<?
namespace UW;

class Services
{
    /**
     * Получат массив URL
     * @return string
     */
    public static function GetArrayURL()
    {
        global $APPLICATION;
        $dir = $APPLICATION->GetCurDir();
        $arDir = explode('/', $dir);
        return $arDir;
    }

    /**
     * Получате название раздела с сайтами-визитками по URL
     * @return string
     */
    public static function GetNameSectionVis()
    {
        return self::GetArrayURL()[1];
    }

    /**
     * Получате код сайта по URL
     * @return string
     */
    public static function GetCodeSite()
    {
        return self::GetArrayURL()[2];
    }

    /**
     * Получает параметр сайта
     * @param string $paramCode
     * @return mixed
     */
    public static function GetSiteParam($paramCode)
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        $arColl = \CIBlockElement::GetList(
            [],
            ['CODE'=>self::GetCodeSite()],
            false,false,['ID','NAME']
        )->GetNext();

        return $arColl[$paramCode];
    }

    /**
     * Возвращает ID коллектива (раздела) в нужном инфоблоке (новости, афиша и т.д.)
     * @param $ibID
     * @return mixed
     */
    public static function GetCollectiveID($ibID)
    {
        $arCollNews = \CIBlockSection::GetList(
            [],
            ['IBLOCK_ID'=>$ibID,'=UF_COLLECTIVE'=>self::GetSiteParam('ID')]
        )->GetNext();

        return $arCollNews['ID'];
    }

    /**
     * @param $bytes
     * @param int $precision
     * @return string
     */
    public static function FBytes($bytes, $precision = 2)
    {
        $units = array('байт', 'кб', 'мб', 'гб', 'тб');
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);
        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}