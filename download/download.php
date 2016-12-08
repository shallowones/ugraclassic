<?
namespace UW;

define("NO_KEEP_STATISTIC", true);
define("NO_AGENT_CHECK", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

\CModule::IncludeModule('iblock');

use \Bitrix\Main\Loader;

/**
 * Добавляет список стран с картинками со страницы http://ru.freeflagicons.com/buy/round_icon/
 * Class AddCountries
 * @package UW
 */
class downloadPhoto
{

        public static function download($id)
    {
//        $photo = json_decode(self::PHOTO, true);
//        $section = json_decode(self::SECTION, true);
        $photo = json_decode(file_get_contents('http://ugraclassic.ru/download/untitled.php'), true);
        $section = json_decode(file_get_contents('http://ugraclassic.ru/download/'), true);

        $res = [];
            $j = 1;
        foreach ($section as $i => $sec) {
            if (($j >= $id)&&($j<$id*10)) {
                foreach ($photo[$sec['id']] as $p) {
                    $section[$i]['files'][] = \CFile::MakeFileArray($p);
                }
                $res[] = $section[$i];
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
                'IBLOCK_ID' => 7,
                'NAME' => $new['name'],
                'CODE' => 'code'.$new['id'],
                'DATE_ACTIVE_FROM' => '01.01.'.(explode('.', $new['date'])[2]),
                "PREVIEW_PICTURE" => \CFile::MakeFileArray($new['src']),
                'PREVIEW_TEXT' => $new['description'],
                'PREVIEW_TEXT_TYPE' => 'html',
                "PROPERTY_VALUES" => ['PHOTO' => $new['files']]
            ));
            $str = $str.$newID[$i].'  ';
            $i++;
        }
        return $str;
    }
}