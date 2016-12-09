<?
namespace UW;

define("NO_KEEP_STATISTIC", true);
define("NO_AGENT_CHECK", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

\CModule::IncludeModule('iblock');

use \Bitrix\Main\Loader;

class downloadNews
{

    public static function download($id)
    {
        $news = json_decode(file_get_contents('http://ugraclassic.ru/download/news.php'), true);

        $res = [];
        $j = 1;
        foreach ($news as $i => $n) {
            if (($j >= $id)&&($j<$id*20)) {
                $res[$i]['preview_picture'] = \CFile::MakeFileArray($n['preview_picture']);
                $res[$i]['detail_picture'] = \CFile::MakeFileArray($n['detail_picture']);
                $res[$i]['name'] = $n['name'];
                $res[$i]['detail_text'] = $n['detail_text'];
                $res[$i]['preview_text'] = $n['preview_text'];
                $res[$i]['date'] = $n['date'];
                $res[$i]['id'] = $i;
            }
            $j++;
        }
        return self::load_ib($res);
    }

    private static function load_ib($arRes)
    {
        \CModule::IncludeModule('iblock');

        $newID = [];

        $i = 0;
        $str = '';
        foreach ($arRes as $new) {
            $obEl = new \CIBlockElement;
            $newID[$i] = $obEl->Add(array(
                'IBLOCK_ID' => 2,
                'NAME' => $new['name'],
                'CODE' => 'news'.$new['id'],
                'DATE_ACTIVE_FROM' => $new['date'],
                "PREVIEW_PICTURE" => $new['preview_picture'],
                "DETAIL_PICTURE" => $new['detail_picture'],
                'PREVIEW_TEXT' => $new['preview_text'],
                'DETAIL_TEXT' => $new['detail_text'],
                'PREVIEW_TEXT_TYPE' => 'html',
                'DETAIL_TEXT_TYPE' => 'html'
            ));
            $str = $str.$newID[$i].'  ';
            $i++;
        }
        return $str;
    }
}