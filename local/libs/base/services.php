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
     * @param $pictureOld
     * @param $section_id
     */
    public static function DuplicateNews($arFields, $pictureOld = 0, $section_id = 0)
    {
        $arIB = \CIBlock::GetList([],['TYPE'=>'news', 'CODE'=>'news'])->GetNext()['ID'];

        $obEl = new \CIBlockElement;

        $picture = ($arFields['PREVIEW_PICTURE']['error']==0 ? $arFields['PREVIEW_PICTURE'] : $pictureOld);
        if(!is_array($picture) && $picture > 0)
        {
            $picture = \CFile::MakeFileArray($picture);
        }

        $newID = $obEl->Add([
            'IBLOCK_ID' => $arIB['ID'],
            'NAME' => $arFields['NAME'],
            'ACTIVE' => 'N',
            'IBLOCK_SECTION_ID' => false,
            'DATE_ACTIVE_FROM' => $arFields['ACTIVE_FROM'],
            'PREVIEW_PICTURE' => $picture,
            'PREVIEW_TEXT' => $arFields['PREVIEW_TEXT'],
            'PREVIEW_TEXT_TYPE' => $arFields['PREVIEW_TEXT_TYPE'],
            'DETAIL_TEXT' => $arFields['DETAIL_TEXT'],
            'DETAIL_TEXT_TYPE' => $arFields['DETAIL_TEXT_TYPE']

        ]);

        $link = 'http://'.$_SERVER['SERVER_NAME'].'/bitrix/admin/iblock_element_edit.php?IBLOCK_ID='.$arIB['ID'].'&type=news&ID='.$newID.'&lang=ru&find_section_section=0&WF=Y';
        if($newID > 0)
        {
            if($section_id > 0)
            {
                $arSection = \CIBlockSection::GetByID($section_id)->GetNext();

                $arEvent = [
                    'NAME' => $arFields['NAME'],
                    'COLLECTIVE_NAME' => $arSection['NAME'],
                    'NEWS_LINK' => $link
                ];
                \CEvent::SendImmediate('NOTICE_DUPLICATE_NEWS','s1',$arEvent);
            }
        }
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
                self::DuplicateNews($arFields, 0, $arFields['IBLOCK_SECTION'][0]);
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
                    'PREVIEW_PICTURE',
                    'PROPERTY_DUPLICATE_NEWS'
                ]
            )->GetNext();

            if($arOldEl['ID'])
            {
                $boolChecked = self::IsCheckedDuplicateNews($arFields);

                // Если была установлена и сняли, выдаем сообщение
                if(
                    $arOldEl['PROPERTY_DUPLICATE_NEWS_VALUE'] == 'Да' &&
                    !$boolChecked
                )
                {
                    global $APPLICATION;
                    $APPLICATION->ThrowException('Нельзя снять галочку Разместить новость на главной КТЦ "Югра-Классик"!');
                    return false;
                }

                // Если первый раз устанволена, дублируем новость
                if(
                    $arOldEl['PROPERTY_DUPLICATE_NEWS_VALUE'] != 'Да' &&
                    $boolChecked
                )
                {
                    self::DuplicateNews($arFields, $arOldEl['PREVIEW_PICTURE'], $arFields['IBLOCK_SECTION'][0]);
                }
            }
        }
    }
}