<?
namespace UW;

define("NO_KEEP_STATISTIC", true);
define("NO_AGENT_CHECK", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

\CModule::IncludeModule('iblock');

use \Bitrix\Main\Loader;

class downloadNews
{
    const IB_ID = 2;

    public static function download()
    {
        $news = json_decode(file_get_contents('http://ugraclassic.ru/download/news.php'), true);

        $res = [];
        $j = 0;
        $codes = self::in_ib(self::IB_ID);
        //array_splice($news, 13);

        foreach ($news as $i => $n) {

            if (!in_array($i, $codes)) {
                $res[$i]['preview_picture'] = \CFile::MakeFileArray($n['preview_picture']);
                $res[$i]['detail_picture'] = \CFile::MakeFileArray($n['detail_picture']);
                $res[$i]['name'] = $n['name'];
                $res[$i]['detail_text'] = $n['detail_text'];
                $res[$i]['preview_text'] = $n['preview_text'];
                $res[$i]['date'] = $n['date'];
                $res[$i]['id'] = $i;

                $j++;
                if (($j == 5)) {
                    break;
                }
            }
        }
        $stat = (count($res)==0) ? 1 : 0;
        self::load_ib($res);
        return $stat;
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
                'IBLOCK_ID' => self::IB_ID,
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

    private static function in_ib($ib_id)
    {
        $rsEl = \CIBlockElement::GetList(
            array(),
            array(
                'IBLOCK_ID' => $ib_id,
            ),
            false,
            false,
            array('IBLOCK_ID', 'ID', 'CODE')
        );
        $res =[];
        while ($ob = $rsEl->GetNextELEMENT()) {
            $arF = $ob->GetFields();
            $res[] = str_replace('news','',$arF['CODE']);
        }
        return $res;
    }
}