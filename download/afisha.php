<?
namespace UW;

mb_internal_encoding("UTF-8");
define("NO_KEEP_STATISTIC", true);
define("NO_AGENT_CHECK", true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

\CModule::IncludeModule('iblock');

use \Bitrix\Main\Loader;

class downloadAfisha
{
    public static function download($id)
    {
        $size = array(
            'width' => '1280',
            'height' => '1024'
        );
        $afisha = json_decode(file_get_contents('http://ugraclassic.ru/download/afisha.php'), true);

        $res = [];
        $j = 0;
        $codes = self::in_ib(1);
        gg($codes);
//        array_splice($afisha, 20);

        foreach ($afisha as $i => $n) {

            $code = self::rus2translit($n['name']) . '_' . $n['id'];

            if (!in_array($code, $codes)) {
                $res[$i]['id'] = $n['id'];
                $res[$i]['name'] = $n['name'];
                $res[$i]['sub_header'] = $n['sub_text'];
                $res[$i]['type'] = $n['type'];
                $res[$i]['duration'] = $n['duration'];
                $res[$i]['cost'] = $n['cost'];

                //картинки
                $res[$i]['detail_picture'] = \CFile::MakeFileArray($n['detail_picture']);
                $res[$i]['preview_picture'] = \CFile::MakeFileArray($n['big_pic']);
                $img = \CFile::MakeFileArray($n['big_pic']);
                $fid = \CFile::SaveFile($img, 'tmp_img_from');
                $image = \CFile::ResizeImageGet($fid, $size, BX_RESIZE_IMAGE_EXACT, true);
                $res[$i]['real_picture'] = \CFile::MakeFileArray($_SERVER['DOCUMENT_ROOT'] . $image['src']);

                $res[$i]['detail_text'] = $n['detail_text'];
                $res[$i]['code'] = $code;
                $res[$i]['preview_text'] = $n['preview_text'];
                $res[$i]['hall'] = self::halls($n['hall']);
                $res[$i]['age'] = self::age($n['age']);
                if ($n['section'] == 17) {
                    $res[$i]['location'] = 26;
                }

                //обработка дат
                if ($n['date_from'] && $n['date_to']) {
                    $res[$i]['date_from'] = self::date_check($n['date_from']);
                    $res[$i]['date_to'] = self::date_check($n['date_to']);
                } elseif ($n['date_to']) {
                    $res[$i]['date_from'] = $res[$i]['date_to'] = self::date_check($n['date_to']);
                } elseif ($n['date_from']) {
                    $res[$i]['date_from'] = $res[$i]['date_to'] = self::date_check($n['date_from']);
                }
                foreach ($n['dates'] as $d) {
                    $res[$i]['dates'][] = self::date_check($d);
                }
                $res[$i]['date'] = $n['date'];

                gg($res[$i]);

                $j++;
//                if (($j == 5)) {
//                    break;
//                }
            }
        }
        $stat = (count($res)==0) ? 1 : 0;
        $str = self::load_ib($res, 1);
        return $str;
    }

    private static function date_check($date){
        $check = explode(' ', trim($date));
        if (count($check)==2){
            return $date;
        }else{
            return $check[0].' 00:00:01';
        }
    }

    private static function load_ib($arRes, $id)
    {
        \CModule::IncludeModule('iblock');

        $newID = [];

        $i = 0;
        $str = '';
        foreach ($arRes as $new) {
            $obEl = new \CIBlockElement;
            $newID[$i] = $obEl->Add(array(
                'IBLOCK_ID' => $id,
                'NAME' => $new['name'],
                'CODE' => $new['code'],
                'DATE_ACTIVE_FROM' => $new['date_from'],
                'DATE_ACTIVE_TO' => $new['date_to'],
                "PREVIEW_PICTURE" => $new['preview_picture'],
                "DETAIL_PICTURE" => $new['detail_picture'],
                'PREVIEW_TEXT' => $new['preview_text'],
                'DETAIL_TEXT' => $new['detail_text'],
                'PREVIEW_TEXT_TYPE' => 'html',
                'DETAIL_TEXT_TYPE' => 'html',
                'PROPERTY_VALUES' => [
                    'sub_header' => $new['sub_text'],
                    'date_text' => $new['date'],
                    'hall' => $new['hall'],
                    'type' => $new['type'],
                    'age' => $new['age'],
                    'duration' => $new['duration'],
                    'cost' => $new['cost'],
                    'real_picture' => $new['real_picture'],
                    'dates' => $new['dates'],
                    'location' => $new['location'],
                ],
            ));
            if ($newID[$i]) {
                $str = $str . $newID[$i] . '  ';
            }
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
            $res[] = $arF['CODE'];
        }
        return $res;
    }

    function gG($var, $mode = 0, $str = 'Var', $die = 0)
    {
        switch($mode){
            case 0:
                echo "<pre>";
                echo "######### {$str} ##########<br/>";
                print_r($var);
                echo "</pre>";
                if($die) die();
                break;
            case 2:
                $handle = fopen($_SERVER["DOCUMENT_ROOT"]."/upload/debug.txt", "a+");
                fwrite($handle, "######### {$str} ##########\n");
                fwrite($handle, (string)$var);
                fwrite($handle, "\n\n\n");

                fclose($handle);
                break;
        }

    }

    private static function halls($hall){
        $halls = [
            23 => 'большой зал',
            24 => 'органный зал',
            27 => 'трансформер',
            337 => 'арт-салон',
            338 => 'пресс-зал',
            339 => 'венское кафе',
            340 => 'сургутская филармония',
            336 => 'фортепианный класс',
            367 => 'зал амадеус',
        ];
        $halls_old = explode(', ', mb_strtolower($hall));
        $halls_new = [];
        foreach ($halls_old as $old){
            foreach ($halls as $key => $h){
                if (substr_count($old, $h)){
                    $halls_new[] = $key;
                    break(1);
                }
            }
        }
        return $halls_new;
    }

    private static function age($age){
        $ages = [
            1 => '0+',
            2 => '1+',
            3 => '2+',
            4 => '3+',
            5 => '4+',
            6 => '5+',
            7 => '6+',
            8 => '7+',
            9 => '8+',
            10 => '9+',
            11 => '10+',
            12 => '11+',
            13 => '12+',
            14 => '13+',
            15 => '14+',
            16 => '15+',
            17 => '16+',
            18 => '17+',
            19 => '18+',
            20 => '19+',
            21 => '20+',
            22 => '21+',
        ];
        $age_old = explode(', ', $age);
            foreach ($ages as $key => $a){
                if (substr_count($a, $age_old[0])){
                    $age_new = $key;
                    break;
                }
            }
        return $age_new;
    }

    private static function rus2translit($string) {
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
            ' ' => '-',
        );
        return strtr($string, $converter);
    }
}
$s = true;
 {
    $s = downloadAfisha::download(0);
    echo $s;
}