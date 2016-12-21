<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult['ITEMS'] as $key => $arItem)
{
    $arResult['ITEMS'][$key]['PROMO_IMG_BIG'] = '';
    if($arItem["PROPERTIES"]['img_promo']['VALUE'] > 0)
    {
        $mini_img = CFile::ResizeImageGet(
            $arItem["PROPERTIES"]['img_promo']['VALUE'],
            array('width'=>820, 'height'=>546),
            BX_RESIZE_IMAGE_EXACT, true
        );
        $arResult['ITEMS'][$key]['PROMO_IMG_BIG'] = $mini_img['src'];
    }

    $arResult['ITEMS'][$key]['PROMO_IMG_SWIPER'] = '';
    if($arItem["PROPERTIES"]['img_promo']['VALUE'] > 0)
    {
        $mini_img = CFile::ResizeImageGet(
            $arItem["PROPERTIES"]['img_promo']['VALUE'],
            array('width'=>688, 'height'=>458),
            BX_RESIZE_IMAGE_EXACT, true
        );
        $arResult['ITEMS'][$key]['PROMO_IMG_SWIPER'] = $mini_img['src'];
    }

    $arResult['ITEMS'][$key]['PROMO_DATE'] = '';
    if($arItem['ACTIVE_FROM'])
    {
        $date = ParseDateTime($arItem['ACTIVE_FROM'], FORMAT_DATETIME);
        $date2 = intval($date["DD"])." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S"));

        $time = ConvertDateTime($arItem['ACTIVE_FROM'],"HH:MI");
        if ($time!="00:00") {
            $date2 .= ", ";
            $date2 .=  $time;
        }

        $arResult['ITEMS'][$key]['PROMO_DATE'] = $date2;
    }
}


$arIB = \CIBlock::GetList([],['CODE'=>'promo_banner'],false)->GetNext();
if($arIB['ID'])
{
    $rsEl = \CIBlockElement::GetList(
        ['SORT'=>'ASC','ID'=>'DESC'],
        ['IBLOCK_ID'=>$arIB['ID'], 'ACTIVE'=>'Y'],
        false,
        ['nTopCount' => 2],
        ['IBLOCK_ID','ID','NAME','PREVIEW_PICTURE','CODE']
    );
    while($obEl = $rsEl->GetNextElement())
    {
        $arFields = $obEl->GetFields();

        $PICTURE = [];
        $PICTURE_SWIPER = [];
        $mini_img = CFile::ResizeImageGet(
            $arFields["PREVIEW_PICTURE"],
            array('width'=>413, 'height'=>268),
            BX_RESIZE_IMAGE_EXACT, true
        );
        $PICTURE = $mini_img;

        $PICTURE_SWIPER = CFile::ResizeImageGet(
            $arFields["PREVIEW_PICTURE"],
            array('width'=>688, 'height'=>458),
            BX_RESIZE_IMAGE_EXACT, true
        );

        $arResult['ITEMS'][] = [
            'NAME' => $arFields['NAME'],
            'PROMO_DATE' => '',
            'DETAIL_PAGE_URL' => $arFields['CODE'],
            'AGE' => '',
            'PROMO_IMG_BIG' => $PICTURE,
            'PROMO_IMG_SWIPER' => $PICTURE_SWIPER['src'] ? $PICTURE_SWIPER['src'] : [],
            'IS_PROMO_IBLOCK' => 'Y'
        ];
    }
}