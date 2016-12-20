<?
namespace UW;

class SubscribeAfisha
{
    protected static $handlerAddSubrDisallow    = false;
    protected static $handlerAddSubrUpdDisallow = false;
    protected static $handlerAddSubrDelDisallow = false;

    /**
     * Добавление мероприятия из афиши в инфоблок рассылки
     * @param $arFields
     */
    public static function AddEventToIbSubscribe(&$arFields)
    {
        \Bitrix\Main\Loader::includeModule('iblock');
        if($arFields['IBLOCK_ID'] == \CIBlock::GetList([],['CODE'=>'events'])->GetNext()['ID'])
        {
            if (self::$handlerAddSubrDisallow)
                return;

            self::$handlerAddSubrDisallow = true;

            $arIB = \CIBlock::GetList([],['TYPE'=>'afisha', 'CODE'=>'events_subscribe'])->GetNext();

            $obEl = new \CIBlockElement;

            $PROP = [];
            $PROP['event_id'] = $arFields['ID'];

            $newID = $obEl->Add([
                'IBLOCK_ID' => $arIB['ID'],
                'NAME' => $arFields['NAME'],
                'ACTIVE' => 'Y',
                'IBLOCK_SECTION_ID' => false,
                'DATE_ACTIVE_FROM' => date('d.m.Y H:i:s'),
                "PROPERTY_VALUES"=> $PROP,
            ]);

            self::$handlerAddSubrDisallow = false;
        }
    }

    /**
     * Lеактивация эхлемента в инфоблоке рассылки
     * @param $arFields
     */
    public static function DeactivateEventSubscribe(&$arFields)
    {
        \Bitrix\Main\Loader::includeModule('iblock');
        if($arFields['IBLOCK_ID'] == \CIBlock::GetList([],['CODE'=>'events'])->GetNext()['ID'])
        {
            if (self::$handlerAddSubrUpdDisallow)
                return;

            self::$handlerAddSubrUpdDisallow = true;

            $arIB = \CIBlock::GetList([],['TYPE'=>'afisha', 'CODE'=>'events_subscribe'])->GetNext();
            $arES = \CIBlockElement::GetList(
                [],
                [
                    'IBLOCK_ID'=>$arIB['ID'],
                    '=PROPERTY_event_id'=>$arFields['ID'],
                    '!PROPERTY_event_id'=>false
                ],
                false,
                false,
                ['IBLOCK_ID','ID','NAME']
            )->GetNext();

            $obEl = new \CIBlockElement;
            if($arES['ID'] && isset($arFields['ACTIVE']))
            {
                $obEl->Update(
                    $arES['ID'],
                    [
                        'ACTIVE' => $arFields['ACTIVE']
                    ]
                );
            }

            self::$handlerAddSubrUpdDisallow = false;
        }
    }

    /**
     * Удаление эхлемента в инфоблоке рассылки
     * @param $ID
     */
    public static function DeleteEventSubscribe($ID)
    {
        \Bitrix\Main\Loader::includeModule('iblock');
        $arIB = \CIBlock::GetList([],['TYPE'=>'afisha', 'CODE'=>'events'])->GetNext();

        $arEE = \CIBlockElement::GetList(
            [],
            [
                'IBLOCK_ID'=>$arIB['ID'],
                '=ID'=>$ID,
            ],
            false,
            false,
            ['IBLOCK_ID','ID','NAME']
        )->GetNext();

        if($arEE['ID'])
        {
            if (self::$handlerAddSubrDelDisallow)
                return;

            self::$handlerAddSubrDelDisallow = true;

            $arIB = \CIBlock::GetList([],['TYPE'=>'afisha', 'CODE'=>'events_subscribe'])->GetNext();
            $arES = \CIBlockElement::GetList(
                [],
                [
                    'IBLOCK_ID'=>$arIB['ID'],
                    '=PROPERTY_event_id'=>$ID,
                    '!PROPERTY_event_id'=>false
                ],
                false,
                false,
                ['IBLOCK_ID','ID','NAME']
            )->GetNext();

            if($arES['ID'])
            {
                global $DB;
                $DB->StartTransaction();
                if(!\CIBlockElement::Delete($arES['ID']))
                {
                    $DB->Rollback();
                }
                else
                    $DB->Commit();
            }

            self::$handlerAddSubrDelDisallow = false;
        }
    }
}