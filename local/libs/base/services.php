<?
namespace UW;

class Services
{
    protected static $handlerDisallow = false;
    protected static $handlerCodeDisallow = false;

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
     * Проверка на существование раздела сайта визитки и на наличие в нем контента
     * @param $ibID
     * @param $siteID int
     * @return bool
     */
    public static function IsSectionVis($ibID, $siteID)
    {
        $result = false;

        $arCollNews = \CIBlockSection::GetList(
            [],
            [
                'IBLOCK_ID'=>$ibID,
                '=UF_COLLECTIVE'=>$siteID,
                'ACTIVE' => 'Y'
            ]
        )->GetNext();

        if(isset($arCollNews['ID']))
        {
            $arEl = \CIBlockElement::GetList(
                [],
                [
                    'IBLOCK_ID'=>$ibID,
                    'SECTION_ID' => $arCollNews['ID'],
                    'ACTIVE' => 'Y'
                ],
                false,
                ['nTopCount' => 1],
                ['ID']
            )->GetNext();
            if($arEl['ID'])
            {
                $result = true;
            }
        }

        return $result;
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
     * @return boolean
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

    /**
     * Проверка на удаление элемента из промо-блока
     * @param $ID
     * @return boolean
     */
    public static function CheckDeletePromo($ID)
    {
        \Bitrix\Main\Loader::includeModule('iblock');
        $rsEl = \CIBlockElement::GetList(
            [],
            ['IBLOCK_CODE'=>'promo_block'],
            false,false,
            ['ID']
        );
        while ($arEl = $rsEl->GetNext())
        {
            $arPromo[] = $arEl['ID'];
        }
        if($arPromo)
        {
            if(in_array($ID, $arPromo))
            {
                global $APPLICATION;
                $APPLICATION->throwException("Данный элемент нельзя удалить!");
                return false;
            }
        }
    }

    /**
     * Проверка на добавление элдемента в промо-блок
     * @param $arFields
     * @return boolean
     */
    public static function CheckAddPromo(&$arFields)
    {
        \Bitrix\Main\Loader::includeModule('iblock');
        if($arFields['IBLOCK_ID'] == \CIBlock::GetList([],['CODE'=>'promo_block'])->GetNext()['ID'])
        {
            global $APPLICATION;
            $APPLICATION->throwException("В данном инфоблоке нельзя создать элемент!");
            return false;
        }
    }

    /**
     * Проверка на редактирование элемента в промо-блоке
     * @param $arFields
     * @return boolean
     */
    public static function CheckEditPromo(&$arFields)
    {
        \Bitrix\Main\Loader::includeModule('iblock');
        if($arFields['IBLOCK_ID'] == \CIBlock::GetList([],['CODE'=>'promo_block'])->GetNext()['ID'])
        {
            $boolSelectOut = false;

            $arProp = \CIBlockProperty::GetList(
                [], ["IBLOCK_ID"=>$arFields['IBLOCK_ID'],'CODE'=>'SELECT_OUT']
            )->GetNext();
            if($arProp['ID'])
            {
                foreach ($arFields['PROPERTY_VALUES'][$arProp['ID']] as $arVal)
                {
                    if($arVal['VALUE'] > 0)
                    {
                        $boolSelectOut = true;
                    }
                }
            }

            $boolRelBanner = false;
            $boolRelEvent = false;

            $arProp = \CIBlockProperty::GetList(
                [], ["IBLOCK_ID"=>$arFields['IBLOCK_ID'],'CODE'=>'RELATION_BANNER']
            )->GetNext();
            if($arProp['ID'])
            {
                foreach ($arFields['PROPERTY_VALUES'][$arProp['ID']] as $arVal)
                {
                    if($arVal['VALUE'] > 0)
                    {
                        $boolRelBanner = true;
                    }
                }
            }
            $arProp = \CIBlockProperty::GetList(
                [], ["IBLOCK_ID"=>$arFields['IBLOCK_ID'],'CODE'=>'RELATION_EVENT']
            )->GetNext();
            if($arProp['ID'])
            {
                foreach ($arFields['PROPERTY_VALUES'][$arProp['ID']] as $arVal)
                {
                    if($arVal['VALUE'] > 0)
                    {
                        $boolRelEvent = true;
                    }
                }
            }

            $boolPrev = false;
            $boolDetail = false;

            if(isset($arFields['PREVIEW_PICTURE']))
            {
                $arPrev = $arFields['PREVIEW_PICTURE'];
                $boolPrev = !empty($arPrev['name']) || ($arPrev['old_file'] > 0 && !isset($arPrev['del']));
            }
            if(isset($arFields['DETAIL_PICTURE']))
            {
                $arDetail = $arFields['DETAIL_PICTURE'];
                $boolDetail = !empty($arDetail['name']) || ($arDetail['old_file'] > 0 && !isset($arDetail['del']));
            }

            if(!$boolPrev && !$boolDetail && !$boolRelBanner)
            {
                global $APPLICATION;
                $APPLICATION->throwException("Должно быть загружено большое или маленькое изображение!");
                return false;
            }

            if(!$boolRelEvent && !$boolRelBanner)
            {
                global $APPLICATION;
                $APPLICATION->throwException("Обязательно должен быть привязан либо баннер, либо мероприятие!");
                return false;
            }

            if(!$boolSelectOut)
            {
                global $APPLICATION;
                $APPLICATION->throwException("Должен быть выбран вывод мероприятия из афиши или промо-баннера!");
                return false;
            }
        }
    }

    /**
     * Возвращает хэш для отписки
     * @param $email
     * @return string
     */
    function GetMailHash($email)
    {
        return md5(md5($email) . 'svs_khmao_9351048');
    }

    /**
     * Перед отправкой выпуска каждому конкретному подписчику подменяются маски - ID подписки и код, основанный на хеше
     * @param $arFields
     * @return mixed
     */
    function BeforePostingSendMailHandler($arFields)
    {
        \Bitrix\Main\Loader::includeModule('subscribe');

        $rsSub = \CSubscription::GetByEmail($arFields["EMAIL"]);
        $arSub = $rsSub->Fetch();

        $arFields["BODY"] = str_replace("#MAIL_ID#", $arSub["ID"], $arFields["BODY"]);
        $arFields["BODY"] = str_replace("#MAIL_MD5#", self::GetMailHash($arFields["EMAIL"]), $arFields["BODY"]);

        return $arFields;
    }

    /**
     * Копирование дат проведения для афишы
     * @param $arFields
     */
    function CopyDatesAfisha(&$arFields)
    {
        \Bitrix\Main\Loader::includeModule('iblock');
        if($arFields['IBLOCK_ID'] == \CIBlock::GetList([],['CODE'=>'events'])->GetNext()['ID'])
        {
            if (self::$handlerDisallow)
                return;

            self::$handlerDisallow = true;

            $obEl = \CIBlockElement::GetList(
                [],
                ['IBLOCK_ID' => $arFields['IBLOCK_ID'], 'ID' => $arFields['ID']],
                false,false,
                ['IBLOCK_ID', 'ID', 'NAME', 'DATE_ACTIVE_FROM', 'DATE_ACTIVE_TO']
            )->GetNextElement();

            $arEl = $obEl->GetFields();
            $arEl['PROPS'] = $obEl->GetProperties();

            if($arEl['ID'])
            {
                $obEl = new \CIBlockElement;

                // Если дата окончания пустая, то заполняем датйо начала
                if(strlen(trim($arEl['DATE_ACTIVE_TO'])) < 1)
                {
                    $obEl->Update(
                        $arEl['ID'],
                        [
                            'DATE_ACTIVE_TO' => $arEl['DATE_ACTIVE_FROM']
                        ]
                    );
                    $arEl['DATE_ACTIVE_TO'] = $arEl['DATE_ACTIVE_FROM'];
                }

                $mDateFrom = date('Y-m-d H:i:s', MakeTimeStamp($arEl['DATE_ACTIVE_FROM']));
                $mDateTo = date('Y-m-d H:i:s', MakeTimeStamp($arEl['DATE_ACTIVE_TO']));

                // Заполняем множественное совйство "Дата(ы) проведения для календаря"
                // св-во заполнено
                if(is_array($arEl['PROPS']['dates']['VALUE']) && count($arEl['PROPS']['dates']['VALUE']) > 0)
                {
                    $keyProp1 = $arEl['PROPS']['dates']['PROPERTY_VALUE_ID'][0];
                    if(isset($arEl['PROPS']['dates']['PROPERTY_VALUE_ID'][1]))
                    {
                        $keyProp2 = $arEl['PROPS']['dates']['PROPERTY_VALUE_ID'][1];
                    }
                    else
                    {
                        $keyProp2 = 0;
                    }

                    // есть две даты для заполнения
                    if($arEl['DATE_ACTIVE_FROM'] != $arEl['DATE_ACTIVE_TO'])
                    {
                        $arUpd = [
                            $keyProp1 => $mDateFrom,
                            $keyProp2 => $mDateTo
                        ];
                        foreach ($arEl['PROPS']['dates']['PROPERTY_VALUE_ID'] as $k => $val)
                        {
                            if($k > 1)
                            {
                                $arUpd[$val] =
                                    date('Y-m-d H:i:s', MakeTimeStamp($arEl['PROPS']['dates']['VALUE'][$k]));
                            }
                        }

                        \CIBlockElement::SetPropertyValuesEx(
                            $arEl['ID'],
                            $arFields['IBLOCK_ID'],
                            [
                                'dates' => $arUpd
                            ]
                        );
                    }
                    // есть только одна дата
                    else
                    {
                        $arUpd = [
                            $keyProp1 => $mDateFrom,
                        ];
                        foreach ($arEl['PROPS']['dates']['PROPERTY_VALUE_ID'] as $k => $val)
                        {
                            if($k > 0)
                            {
                                $arUpd[$val] =
                                    date('Y-m-d H:i:s', MakeTimeStamp($arEl['PROPS']['dates']['VALUE'][$k]));
                            }
                        }

                        \CIBlockElement::SetPropertyValuesEx(
                            $arEl['ID'],
                            $arFields['IBLOCK_ID'],
                            [
                                'dates' => $arUpd
                            ]
                        );
                    }
                }
                else
                // св-во пустое
                {
                    // есть две даты для заполнения
                    if($arEl['DATE_ACTIVE_FROM'] != $arEl['DATE_ACTIVE_TO'])
                    {
                        \CIBlockElement::SetPropertyValuesEx(
                            $arEl['ID'],
                            $arFields['IBLOCK_ID'],
                            [
                                'dates' => [
                                    0 => $mDateFrom,
                                    1 => $mDateTo,
                                ]
                            ]
                        );
                    }
                    // есть только одна дата
                    else
                    {
                        \CIBlockElement::SetPropertyValuesEx(
                            $arEl['ID'],
                            $arFields['IBLOCK_ID'],
                            [
                                'dates' => [0 => $mDateFrom]
                            ]
                        );
                    }
                }

                //gg($arEl);
            }

            self::$handlerDisallow = false;

            //die();
        }
    }

    /**
     * Добавляем к символьному коду ID элемента
     * @param $arFields
     */
    function AddIdForCode(&$arFields)
    {
        \Bitrix\Main\Loader::includeModule('iblock');
        if($arFields['IBLOCK_ID'] == \CIBlock::GetList([],['CODE'=>'events'])->GetNext()['ID'])
        {
            if (self::$handlerCodeDisallow)
                return;

            self::$handlerCodeDisallow = true;

            if(stripos($arFields['CODE'], $arFields['ID']) === false)
            {
                $obEl = new \CIBlockElement;
                $obEl->Update(
                    $arFields['ID'],
                    [
                        'CODE' => $arFields['CODE'] . '-' . $arFields['ID']
                    ]
                );
            }

            self::$handlerCodeDisallow = false;
        }
    }

    /**
     * Возвращает группу по символьному идентификатору
     * @param $code
     * @return mixed
     */
    public static function GetGroupByCode ($code)
    {
        $rsGroups = \CGroup::GetList ($by = "c_sort", $order = "asc", Array ("STRING_ID" => $code));
        $arGroups = $rsGroups->Fetch();
        return  $arGroups['ID'];
    }

    /**
     * Скрывает разделы
     * @param $aGlobalMenu
     * @param $aModuleMenu
     */
    public static function ASDOnBuildGlobalMenu(&$aGlobalMenu, &$aModuleMenu)
    {
        global $USER;
        $arGroups = $USER->GetUserGroupArray();
        $edit_dou = self::GetGroupByCode('edit_dou');

        $findStr = '';
        if(in_array($edit_dou, $arGroups))
        {
            $arS = \CIBlockSection::GetList([],['IBLOCK_CODE'=>'artisty_collective','CODE'=>'coll_duh_ork'],false,['NAME'],false)->GetNext();
            $findStr = $arS['NAME'];
        }

        if(
        in_array($edit_dou, $arGroups)
        )
        {
            foreach ($aModuleMenu as $k => $v) {

                if ($v["parent_menu"] == "global_menu_content" && $v["items_id"] == "menu_iblock_/site_visit")
                {
                    foreach ($v["items"] as $i4 => $aMenu4) {
                        foreach ($aMenu4["items"] as $i5 => $aMenu5)
                        {
                            if(strpos($aMenu5['text'], $findStr) === false)
                            {
                                unset($aModuleMenu[$k]["items"][$i4]["items"][$i5]);
                            }
                        }
                    }
                }
            }
        }
    }
}