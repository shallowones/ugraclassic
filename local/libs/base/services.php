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
     * @param mixed $paramCode
     * @return mixed
     */
    public static function GetSiteParam($paramCode)
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        $arColl = \CIBlockElement::GetList(
            [],
            [
                'IBLOCK_CODE' => 'collective',
                'CODE' => self::GetCodeSite()
            ],
            false,false,
            ['IBLOCK_ID','ID','NAME','PROPERTY_LOGO','PROPERTY_CONTACTS','PROPERTY_FOOTER_NAME']
        )->GetNext();

        if(is_array($paramCode))
        {
            $arRes = [];
            foreach ($paramCode as $code)
            {
                $arRes[$code] = $arColl[$code];
            }

            return $arRes;
        }
        else
        {
            return $arColl[$paramCode];
        }
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

    /**
     * Непосредственно дублирование новостей
     * @param $arFields
     */
    public static function DuplicateNews($arFields)
    {
        $arIB = \CIBlock::GetList([],['TYPE'=>'news', 'CODE'=>'news'])->GetNext()['ID'];

        $obEl = new \CIBlockElement;

        $obEl->Add([
            'IBLOCK_ID' => $arIB['ID'],
            'NAME' => $arFields['NAME'],
            'ACTIVE' => 'N',
            'IBLOCK_SECTION_ID' => false,
            'DATE_ACTIVE_FROM' => $arFields['ACTIVE_FROM'],
            'PREVIEW_PICTURE' => $arFields['PREVIEW_PICTURE'],
            'PREVIEW_TEXT' => $arFields['PREVIEW_TEXT'],
            'PREVIEW_TEXT_TYPE' => $arFields['PREVIEW_TEXT_TYPE'],
            'DETAIL_TEXT' => $arFields['DETAIL_TEXT'],
            'DETAIL_TEXT_TYPE' => $arFields['DETAIL_TEXT_TYPE']

        ]);


        /*\UW\SystemBase::debug($obEl->LAST_ERROR);
        \UW\SystemBase::debug($arIB);
        \UW\SystemBase::debug($arFields);
        die();*/
    }

    /**
     * Непосредственно проверка галочки дублирования новости
     * @param $arFields
     * @return boolean
     */
    public static function IsCheckedDuplicateNews($arFields)
    {
        $result = false;

        $arProp = \CIBlockProperty::GetList(
            [], ["IBLOCK_ID"=>$arFields['IBLOCK_ID'],'CODE'=>'DUPLICATE_NEWS']
        )->GetNext();
        if($arProp['ID'])
        {
            $arEnum = \CIBlockPropertyEnum::GetList(
                [],
                [
                    "IBLOCK_ID"=>$arFields['IBLOCK_ID'],
                    "CODE"=>"DUPLICATE_NEWS",
                    "XML_ID"=>'DUPLICATE_NEWS_OK'
                ]
            )->GetNext();
            if($arEnum['ID'])
            {
                foreach ($arFields['PROPERTY_VALUES'][$arProp['ID']] as $arVal)
                {
                    if($arVal['VALUE'] == $arEnum['ID'])
                    {
                        $result = true;
                    }
                }
            }
        }

        return $result;
    }

    /**
     * До создания элемента просто проверяем на то установлена ли галочка
     * @param $arFields
     */
    public static function CheckDuplicateNewsForAdd(&$arFields)
    {
        \Bitrix\Main\Loader::includeModule('iblock');
        if($arFields['IBLOCK_ID'] == \CIBlock::GetList([],['CODE'=>'news_collective'])->GetNext()['ID'])
        {
            if(self::IsCheckedDuplicateNews($arFields))
            {
                self::DuplicateNews($arFields);
            }
        }
    }

    /**
     * До обновления элеменгта проверяем на то установлена ли галочка впервые
     * @param $arFields
     */
    public static function CheckDuplicateNewsForUpd(&$arFields)
    {
        \Bitrix\Main\Loader::includeModule('iblock');
        if($arFields['IBLOCK_ID'] == \CIBlock::GetList([],['CODE'=>'news_collective'])->GetNext()['ID'])
        {
            $arOldEl = \CIBlockElement::GetList(
                [],
                [
                    'IBLOCK_ID'=>$arFields['IBLOCK_ID'],
                    'ID'=>$arFields['ID']
                ],
                false,false,
                [
                    'IBLOCK_ID',
                    'ID',
                    'NAME',
                    'PROPERTY_DUPLICATE_NEWS'
                ]
            )->GetNext();

            if($arOldEl['ID'])
            {
                if(
                    $arOldEl['PROPERTY_DUPLICATE_NEWS_VALUE'] != 'Да' &&
                    self::IsCheckedDuplicateNews($arFields)
                )
                {
                    self::DuplicateNews($arFields);
                }
            }
        }
    }
}