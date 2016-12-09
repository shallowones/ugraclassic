<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult['ITEMS'] as $key => $arItem)
{
    if($arItem['PROPERTIES']['SELECT_OUT']['VALUE_XML_ID'] == 'SELECT_OUT_EVENT')
    {
        $rsEl = CIBlockElement::GetByID($arItem['PROPERTIES']['RELATION_EVENT']['VALUE']);
        if($obEl = $rsEl->GetNextElement())
        {
            $arFields = $obEl->GetFields();
            $arProps = $obEl->GetProperties();

            $date = ParseDateTime($arFields['DATE_ACTIVE_FROM'], FORMAT_DATETIME);
            $date2 = intval($date["DD"])." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S"));

            $time = ConvertDateTime($arFields['DATE_ACTIVE_FROM'],"HH:MI");
            if ($time!="00:00") {
                $date2 .= ", ";
                $date2 .=  $time;
            }

            $PICTURE = [];
            if($key == 0)
            {
                if(is_array($arItem["DETAIL_PICTURE"]))
                {
                    $mini_img = CFile::ResizeImageGet(
                        $arItem["DETAIL_PICTURE"],
                        array('width'=>820, 'height'=>546),
                        BX_RESIZE_IMAGE_EXACT, true
                    );
                    $PICTURE = $mini_img;
                }
                else
                {
                    $mini_img = CFile::ResizeImageGet(
                        $arItem["PREVIEW_PICTURE"],
                        array('width'=>820, 'height'=>546),
                        BX_RESIZE_IMAGE_EXACT, true
                    );
                    $PICTURE = $mini_img;
                }
            }
            if($key > 0)
            {
                if(is_array($arItem["PREVIEW_PICTURE"]))
                {
                    $mini_img = CFile::ResizeImageGet(
                        $arItem["PREVIEW_PICTURE"],
                        array('width'=>413, 'height'=>268),
                        BX_RESIZE_IMAGE_EXACT, true
                    );
                    $PICTURE = $mini_img;
                }
                else
                {
                    $mini_img = CFile::ResizeImageGet(
                        $arItem["DETAIL_PICTURE"],
                        array('width'=>413, 'height'=>268),
                        BX_RESIZE_IMAGE_EXACT, true
                    );
                    $PICTURE = $mini_img;
                }
            }

            $arResult['ITEMS'][$key]['PROMO_DISPLAY'] = [
                'NAME' => $arFields['NAME'],
                'DATE' => $date2,
                'URL' => $arFields['DETAIL_PAGE_URL'],
                'AGE' => $arProps['age']['VALUE'],
                'PICTURE' => $PICTURE,
                'LINK_KASSIR' => $arProps['link_kassir']['VALUE']
            ];
        }
    }
    if($arItem['PROPERTIES']['SELECT_OUT']['VALUE_XML_ID'] == 'SELECT_OUT_BANNER')
    {
        $rsEl = CIBlockElement::GetByID($arItem['PROPERTIES']['RELATION_BANNER']['VALUE']);
        if($obEl = $rsEl->GetNextElement())
        {
            $arFields = $obEl->GetFields();

            $PICTURE = [];
            if($key == 0)
            {
                $mini_img = CFile::ResizeImageGet(
                    $arFields["PREVIEW_PICTURE"],
                    array('width'=>820, 'height'=>546),
                    BX_RESIZE_IMAGE_EXACT, true
                );
                $PICTURE = $mini_img;
            }
            if($key > 0)
            {
                $mini_img = CFile::ResizeImageGet(
                    $arFields["PREVIEW_PICTURE"],
                    array('width'=>413, 'height'=>268),
                    BX_RESIZE_IMAGE_EXACT, true
                );
                $PICTURE = $mini_img;
            }

            $arResult['ITEMS'][$key]['PROMO_DISPLAY'] = [
                'NAME' => '',
                'DATE' => '',
                'URL' => $arFields['CODE'],
                'AGE' => '',
                'PICTURE' => $PICTURE,
                'LINK_KASSIR' => ''
            ];
        }
    }
}
