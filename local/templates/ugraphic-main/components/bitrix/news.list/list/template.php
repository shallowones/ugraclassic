<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<? $i = 0;
foreach ($arResult["ITEMS"] as $arItem) {
    if (strpos($arItem["DETAIL_TEXT"], 'fotootchety')) {
        $i++;
        echo $i . '/ '.$arItem["ID"].'<br>' . $arItem["DETAIL_TEXT"];
        preg_match_all('/fotootchety\/([0-9]+)\//', $arItem["DETAIL_TEXT"], $matches_c, PREG_PATTERN_ORDER);
        gg($matches_c);
//        echo $i . ' ссылка<br>';
//        $text = preg_replace('/<a href=\"(.+)\" .+/', '<a href="/news/photo/code'.$matches_c[1][0].'/">Фотоотчет</a>', $arItem["DETAIL_TEXT"]);
//        echo ($text);

//        $el = new CIBlockElement;
//        $res = $el->Update($arItem['ID'], ["DETAIL_TEXT"=>$text]);
    }
} ?>





