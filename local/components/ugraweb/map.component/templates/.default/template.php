<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */
$this->setFrameMode(true);

// подключаем необходимые файлы
use Bitrix\Main\Page\Asset;

$arPage = [
    'CSS' => [
        SITE_TEMPLATE_PATH . "/js/simple-select/style.css"
    ],
    'JS' => [
        SITE_TEMPLATE_PATH . "/js/simple-select/index.js",
        SITE_TEMPLATE_PATH . "/js/maphilight-master/jquery.maphilight.min.js",
        SITE_TEMPLATE_PATH . "/js/animatescroll.js-master/animatescroll.min.js"
    ]
];
foreach ($arPage['JS'] as $arJS) {
    Asset::getInstance()->addJs($arJS);
}
foreach ($arPage['CSS'] as $arCSS) {
    Asset::getInstance()->addCss($arCSS);
}

if (!CModule::IncludeModule("iblock"))
    return;

// получим список коллективов
$arListCollectives = [];
$res = CIBlockElement::GetList(
    ['SORT' => 'ASC'],
    ['IBLOCK_CODE' => 'collective', 'ACTIVE' => 'Y'],
    false,
    false,
    ['ID', 'NAME']
);
while ($ob = $res->Fetch()) {
    $arListCollectives[] = $ob;
}

// получим список МО
$arListMunicipality = [];
$property_enums = CIBlockPropertyEnum::GetList(
    ["SORT" => "ASC"],
    ["IBLOCK_ID" => $arParams['IBLOCK_ID'], "CODE" => "municipality"]
);
$arID = [];
while ($enum_fields = $property_enums->GetNext()) {
    $arListMunicipality[] = [
        'ID' => $enum_fields["ID"],
        'NAME' => $enum_fields["VALUE"]
    ];
}

// создаем фильтр
if (!empty($_GET['set_filter'])) {
    if (!empty($_GET['collective'])) {
        $GLOBALS['mapFilter']['SECTION_ID'] = $_GET['collective'];
    }
    if (!empty($_GET['municipality'])) {
        $GLOBALS['mapFilter']['=PROPERTY_municipality'] = $_GET['municipality'];
    }
    if (!empty($_GET['date_start'])) {
        $GLOBALS['mapFilter']['>=PROPERTY_date'] = FormatDate("Y-m-d", MakeTimeStamp($_GET['date_start']));
    }
    if (!empty($_GET['date_end'])) {
        $GLOBALS['mapFilter']['=<PROPERTY_date'] = FormatDate("Y-m-d", MakeTimeStamp($_GET['date_end']));
    }
}
?>

    <form method="get" enctype="multipart/form-data" class="tours">
        <div class="navigation">
            <div class="tours__item">
                <label for="collective">Коллективы</label>
                <div class="select">
                    <span class="placeholder">Выберите коллектив</span>
                    <ul>
                        <? foreach ($arListCollectives as $arCollective): ?>
                            <? if ($_GET['collective'] == $arCollective['ID']): ?>
                                <li data-value="<? echo $arCollective['ID'] ?>" data-selected="selected">
                                    <? echo $arCollective['NAME'] ?>
                                </li>
                            <? else: ?>
                                <li data-value="<? echo $arCollective['ID'] ?>">
                                    <? echo $arCollective['NAME'] ?>
                                </li>
                            <? endif; ?>
                        <? endforeach; ?>
                    </ul>
                    <input type="hidden" name="collective">
                </div>
            </div>
            <div class="tours__item">
                <label for="municipality">Муниципальное образование</label>
                <select name="municipality[]" id="municipality" multiple>
                    <? foreach ($arListMunicipality as $arMunicipality): ?>
                        <? if (in_array($arMunicipality['ID'], $_GET['municipality'])): ?>
                            <option value="<? echo $arMunicipality['ID'] ?>" selected>
                                <? echo $arMunicipality['NAME'] ?>
                            </option>
                        <? else: ?>
                            <option value="<? echo $arMunicipality['ID'] ?>">
                                <? echo $arMunicipality['NAME'] ?>
                            </option>
                        <? endif; ?>
                    <? endforeach; ?>
                </select>
            </div>
            <div class="tours__item">
                <label for="dates">Дата</label>
                <ul class="dates">
                    <li class="dates__item">
                        <input type="text" value="<? if (!empty($_GET['date_start'])) echo $_GET['date_start'] ?>"
                               name="date_start" id="date_start" title="">
                    </li>
                    <li class="dates__item">
                        <input type="text" value="<? if (!empty($_GET['date_end'])) echo $_GET['date_end'] ?>"
                               name="date_end" id="date_end" title="">
                    </li>
                </ul>
            </div>
            <div class="filter-buttons">
                <input type="submit" name="set_filter" value="Применить">
                <div class="rset" id='deselect-all'><a href="javascript:void(0)">Сбросить</a></div>
            </div>
        </div>
        <div class="ev-map">
            <img src="<? echo SITE_TEMPLATE_PATH . '/img/Yugra_Subdivisions.png' ?>" width="598" height="358"
                 usemap="#Map"
                 class="mapq">
            <map name="Map" id="Map" class="map-map">
                <area data-index="area-1"
                      class="map-item"
                      shape="poly"
                      title="Березовский район"
                      alt="Березовский район"
                      href="#1"
                      coords="64,3,61,5,59,8,57,11,55,14,53,18,50,21,50,24,49,28,49,30,47,33,44,34,42,38,39,41,37,44,34,45,31,45,28,42,25,41,22,41,18,43,15,46,13,49,12,51,11,55,11,58,11,61,9,63,8,65,9,67,10,69,11,73,10,76,10,77,10,81,11,85,12,85,15,88,16,91,15,94,14,97,11,99,9,102,8,105,7,108,7,111,7,115,6,119,6,121,5,125,5,127,5,129,5,132,5,134,5,138,4,141,3,145,4,148,6,149,7,152,6,156,5,157,4,160,5,162,6,163,7,167,9,169,10,173,10,177,10,181,9,184,7,187,6,192,6,196,9,198,11,198,13,199,16,201,18,205,20,206,22,208,24,209,26,209,28,209,30,209,33,209,35,209,37,207,36,205,38,204,40,203,41,203,43,202,46,201,47,200,49,199,51,196,49,193,50,192,53,191,55,189,57,188,59,187,61,186,63,187,64,187,68,189,71,187,73,184,76,184,78,186,80,187,83,187,85,186,88,185,91,186,94,186,97,186,100,186,102,184,105,183,109,182,112,183,117,184,118,185,119,184,121,183,123,182,122,179,121,176,122,174,124,173,124,168,122,164,121,161,120,158,120,154,119,150,118,146,119,142,120,138,119,134,120,131,122,128,124,127,126,126,128,127,130,127,131,126,135,125,137,123,134,119,135,116,136,114,136,110,135,105,137,102,140,98,142,95,144,93,146,90,146,86,145,82,146,78,147,75,146,71,144,67,140,65,137,69,134,71,132,73,128,73,124,72,121,73,118,75,112,77,107,79,103,82,97,80,94,79,94,75,93,71,90,70,84,72,80,71,76,68,74,64,75,61,78,57,77,53,76,48,76,43,79,38,81,36,81,31,80,27,76,24,72,21,70,17,70,13,67,9,66,5"
                      <? if ($_GET['area-1']): ?>data-selected="selected"<? endif; ?>
                >
                <? if ($_GET['area-1']): ?>
                    <input type="hidden" name="area-1" id="area-1" value="true">
                <? endif; ?>
                <area data-index="area-2"
                      class="map-item"
                      shape="poly"
                      title="Белоярский район"
                      alt="Белоярский район"
                      href="#2"
                      coords="144,66,144,68,145,69,146,71,148,73,148,75,147,77,146,80,146,82,147,85,146,88,146,91,144,93,143,96,140,98,139,100,137,103,136,106,136,109,137,111,136,113,135,116,135,118,136,121,138,123,140,124,143,125,145,127,146,128,148,129,148,131,146,132,145,134,146,137,148,138,150,138,153,139,156,140,158,143,158,145,158,147,157,149,158,151,159,154,160,155,162,156,164,157,166,158,169,159,171,159,174,161,175,162,178,163,181,164,183,163,186,163,188,161,191,158,194,156,199,152,203,149,206,147,210,147,211,149,212,151,213,153,216,154,218,153,222,150,226,148,230,146,234,143,237,141,241,139,245,136,249,137,251,138,254,139,259,140,263,135,265,137,269,139,271,141,273,141,275,140,277,138,279,136,276,134,275,131,276,128,276,124,275,120,274,117,273,114,270,112,268,112,266,112,263,111,261,109,260,106,258,103,256,100,253,97,253,94,255,92,257,90,258,87,254,84,251,82,247,81,242,79,239,78,236,78,233,76,230,75,227,74,224,72,220,70,218,72,219,76,219,79,218,81,216,82,212,82,209,81,205,82,203,84,201,86,199,87,197,90,195,92,193,96,190,94,187,92,184,91,181,90,177,88,175,85,172,82,170,80,169,77,169,75,170,72,172,71,169,69,165,68,160,67,156,65,151,65,147,64"
                      <? if ($_GET['area-2']): ?>data-selected="selected"<? endif; ?>
                >
                <? if ($_GET['area-2']): ?>
                    <input type="hidden" name="area-2" id="area-2" value="true">
                <? endif; ?>
                <area data-index="area-3"
                      class="map-item"
                      shape="poly"
                      title="Октябрьский район"
                      alt="Октябрьский район"
                      href="#3"
                      coords="138,123.5,136,124.5,135,125.5,133,125.5,131,126.5,130,128.5,128,127.5,126,127.5,123,128.5,121,131.5,120,134.5,120,138.5,120,140.5,120,142.5,119,146.5,119,150.5,120,153.5,120,156.5,121,160.5,122,162.5,123,165.5,124,169.5,124,172.5,122,174.5,121,177.5,123,180.5,121,182.5,119,185.5,121,187.5,122,188.5,123,191.5,121,194.5,120,197.5,122,200.5,124,205.5,126,208.5,129,210.5,131,210.5,135,208.5,138,207.5,143,206.5,146,208.5,149,210.5,147,213.5,146,216.5,148,219.5,149,222.5,149,226.5,148,228.5,151,229.5,153,229.5,155,229.5,159,227.5,162,228.5,165,230.5,167,231.5,171,229.5,174,227.5,177,225.5,179,223.5,182,220.5,184,218.5,186,217.5,188,215.5,189,212.5,192,211.5,195,210.5,197,208.5,197,204.5,194,202.5,193,199.5,192,196.5,188,192.5,184,188.5,181,186.5,179,183.5,180,181.5,182,179.5,183,177.5,182,172.5,181,169.5,180,166.5,180,163.5,177,162.5,172,159.5,168,158.5,165,158.5,161,156.5,158,153.5,157,149.5,157,146.5,158,144.5,157,140.5,152,138.5,149,138.5,145,136.5,145,134.5,146,132.5,149,130.5,147,128.5,144,126.5,140,124.5"
                      <? if ($_GET['area-3']): ?>data-selected="selected"<? endif; ?>
                >
                <? if ($_GET['area-3']): ?>
                    <input type="hidden" name="area-3" id="area-3" value="true">
                <? endif; ?>
                <area data-index="area-4"
                      class="map-item"
                      shape="poly"
                      title="Советский район"
                      alt="Советский район"
                      href="#4"
                      coords="37,208.25,39,209.25,41,210.25,44,212.25,47,214.25,50,215.25,53,218.25,55,220.25,57,221.25,60,224.25,62,226.25,65,228.25,70,228.25,74,230.25,77,233.25,80,238.25,81,243.25,82,248.25,82,253.25,83,258.25,84,262.25,85,266.25,87,270.25,90,270.25,92,268.25,95,266.25,98,264.25,101,262.25,105,259.25,108,257.25,112,255.25,116,252.25,120,251.25,124,247.25,128,244.25,131,241.25,135,239.25,138,236.25,142,234.25,145,232.25,149,227.25,148,222.25,148,220.25,146,216.25,147,213.25,148,209.25,143,207.25,139,206.25,136,207.25,133,209.25,129,210.25,125,207.25,122,203.25,121,199.25,119,196.25,122,193.25,124,190.25,120,186.25,116,185.25,111,184.25,107,183.25,103,184.25,101,186.25,96,187.25,91,186.25,85,186.25,82,188.25,78,186.25,74,184.25,72,186.25,70,189.25,67,189.25,63,188.25,59,187.25,55,190.25,52,192.25,49,194.25,49,197.25,49,200.25,45,201.25,42,202.25,39,203.25,36,206.25"
                      <? if ($_GET['area-4']): ?>data-selected="selected"<? endif; ?>
                >
                <? if ($_GET['area-4']): ?>
                    <input type="hidden" name="area-4" id="area-4" value="true">
                <? endif; ?>
                <area data-index="area-5"
                      class="map-item"
                      shape="poly"
                      title="Ханты-Мансийский район"
                      alt="Ханты-Мансийский район"
                      href="#5"
                      coords="259,139.66666666666669,256,139.66666666666669,252,138.66666666666669,247,136.66666666666669,244,137.66666666666669,241,139.66666666666669,237,142.66666666666669,233,144.66666666666669,229,146.66666666666669,226,148.66666666666669,221,151.66666666666669,217,153.66666666666669,214,153.66666666666669,212,150.66666666666669,210,147.66666666666669,207,146.66666666666669,203,149.66666666666669,199,151.66666666666669,196,153.66666666666669,194,156.66666666666669,190,159.66666666666669,186,161.66666666666669,180,163.66666666666669,179,166.66666666666669,181,170.66666666666669,182,173.66666666666669,182,175.66666666666669,183,177.66666666666669,181,180.66666666666669,179,183.66666666666669,181,185.66666666666669,183,187.66666666666669,185,190.66666666666669,188,191.66666666666669,191,194.66666666666669,193,198.66666666666669,193,201.66666666666669,195,203.66666666666669,197,206.66666666666674,196,208.66666666666674,192,210.66666666666674,189,212.66666666666674,187,216.66666666666674,183,219.66666666666674,180,221.66666666666674,177,224.66666666666674,173,227.66666666666674,168,229.66666666666674,165,231.66666666666674,163,228.66666666666674,159,226.66666666666674,155,228.66666666666674,156,232.66666666666674,156,236.66666666666674,155,240.66666666666674,158,243.66666666666674,160,246.66666666666674,162,248.66666666666674,165,250.66666666666674,167,253.66666666666674,170,257.66666666666674,167,260.66666666666674,168,264.66666666666674,170,265.66666666666674,174,264.66666666666674,177,262.66666666666674,180,262.66666666666674,183,265.66666666666674,183,270.66666666666674,182,273.66666666666674,183,278.66666666666674,182,282.66666666666674,183,285.66666666666674,187,287.66666666666674,195,288.66666666666674,200,288.66666666666674,204,285.66666666666674,207,282.66666666666674,210,276.66666666666674,207,270.66666666666674,215,265.66666666666674,220,268.66666666666674,226,263.66666666666674,229,263.66666666666674,233,266.66666666666674,232,270.66666666666674,230,273.66666666666674,231,278.66666666666674,223,288.66666666666674,223,291.66666666666674,226,291.66666666666674,229,291.66666666666674,235,294.66666666666674,239,295.66666666666674,248,295.66666666666674,251,296.66666666666674,254,298.66666666666674,256,298.66666666666674,258,296.66666666666674,256,292.66666666666674,253,289.66666666666674,252,286.66666666666674,250,283.66666666666674,246,283.66666666666674,245,278.66666666666674,245,274.66666666666674,244,270.66666666666674,243,263.66666666666674,246,260.66666666666674,247,258.66666666666674,251,256.66666666666674,254,253.66666666666674,257,250.66666666666674,260,247.66666666666674,262,243.66666666666674,264,239.66666666666674,260,234.66666666666674,261,232.66666666666674,260,227.66666666666674,262,223.66666666666674,247,199.66666666666669,246,195.66666666666669,249,194.66666666666669,252,192.66666666666669,256,191.66666666666669,259,189.66666666666669,261,185.66666666666669,264,181.66666666666669,267,177.66666666666669,267,173.66666666666669,266,167.66666666666669,264,161.66666666666669,263,156.66666666666669,262,150.66666666666669,260,143.66666666666669"
                      <? if ($_GET['area-5']): ?>data-selected="selected"<? endif; ?>
                >
                <? if ($_GET['area-5']): ?>
                    <input type="hidden" name="area-5" id="area-5" value="true">
                <? endif; ?>
                <area data-index="area-6"
                      class="map-item"
                      shape="poly"
                      title="Кондинский район"
                      alt="Кондинский район"
                      href="#6"
                      coords="154,230,151,229,147,229,146,232,143,234,139,236,135,239,132,241,129,244,126,247,122,249,118,252,115,254,110,256,106,259,101,262,97,265,93,268,88,271,89,275,91,279,93,282,96,284,99,287,102,292,104,298,105,304,105,309,105,314,108,317,114,318,122,319,128,320,134,325,135,329,136,334,138,339,141,344,145,349,149,351,154,353,160,354,165,352,166,346,166,341,170,338,177,337,181,335,184,331,188,328,194,326,200,324,203,323,205,317,207,313,212,309,218,306,222,304,221,299,220,295,223,292,222,289,225,286,228,282,231,279,230,275,231,271,233,267,231,264,226,263,223,265,221,267,218,267,215,266,212,268,209,271,209,274,209,278,208,282,205,285,200,288,195,289,189,288,185,287,182,283,182,279,182,274,183,270,181,264,177,263,171,266,167,264,167,261,169,259,167,253,163,249,159,246,156,241,155,232"
                      <? if ($_GET['area-6']): ?>data-selected="selected"<? endif; ?>
                >
                <? if ($_GET['area-6']): ?>
                    <input type="hidden" name="area-6" id="area-6" value="true">
                <? endif; ?>
                <area data-index="area-7"
                      class="map-item"
                      shape="poly"
                      title="Сургутский район"
                      alt="Сургутский район"
                      href="#7"
                      coords="278,136.60000000000002,277,137.60000000000002,274,140.60000000000002,270,140.60000000000002,266,136.60000000000002,262,134.60000000000002,260,139.60000000000002,261,146.60000000000002,262,154.60000000000002,264,161.60000000000002,266,170.60000000000002,267,177.60000000000002,265,179.60000000000002,265,179.60000000000002,262,185.60000000000002,260,188.60000000000002,256,191.60000000000002,251,193.60000000000002,247,195.60000000000002,246,200.60000000000002,250,204.60000000000002,254,209.60000000000002,257,213.60000000000002,260,219.60000000000002,263,223.60000000000002,260,227.60000000000002,261,232.60000000000002,260,235.60000000000002,265,239.60000000000002,271,239.60000000000002,276,240.60000000000002,281,241.60000000000002,284,240.60000000000002,288,236.60000000000002,293,233.60000000000002,299,234.60000000000002,306,235.60000000000002,310,235.60000000000002,314,238.60000000000002,316,244.60000000000002,313,249.60000000000002,313,254.60000000000002,315,260.6,315,266.6,315,271.6,314,277.6,314,282.6,310,286.6,306,290.6,306,299.6,305,305.6,304,311.6,302,317.6,303,321.6,299,323.6,294,323.6,294,327.6,298,328.6,304,329.6,308,332.6,310,338.6,311,341.6,314,341.6,318,342.6,324,343.6,328,344.6,335,347.6,340,349.6,343,348.6,348,348.6,354,350.6,358,347.6,362,343.6,365,338.6,365,335.6,365,329.6,366,324.6,371,318.6,376,312.6,381,310.6,387,307.6,382,303.6,375,298.6,370,294.6,364,291.6,361,287.6,357,283.6,352,280.6,350,277.6,351,274.6,352,271.6,350,267.6,350,261.6,347,258.6,342,256.6,339,252.60000000000002,344,250.60000000000002,350,249.60000000000002,352,249.60000000000002,356,245.60000000000002,358,240.60000000000002,358,234.60000000000002,354,233.60000000000002,350,232.60000000000002,347,224.60000000000002,347,219.60000000000002,347,211.60000000000002,347,203.60000000000002,346,197.60000000000002,348,194.60000000000002,354,193.60000000000002,359,193.60000000000002,365,194.60000000000002,370,194.60000000000002,374,193.60000000000002,374,189.60000000000002,376,187.60000000000002,382,186.60000000000002,385,183.60000000000002,385,174.60000000000002,384,149.60000000000002,377,146.60000000000002,372,144.60000000000002,368,143.60000000000002,362,143.60000000000002,358,145.60000000000002,353,147.60000000000002,348,147.60000000000002,343,145.60000000000002,339,142.60000000000002,334,140.60000000000002,329,139.60000000000002,322,139.60000000000002,316,136.60000000000002,313,132.60000000000002,309,127.60000000000002,306,130.60000000000002,301,133.60000000000002,296,133.60000000000002,291,132.60000000000002,288,135.60000000000002,283,137.60000000000002,279,136.60000000000002"
                      <? if ($_GET['area-7']): ?>data-selected="selected"<? endif; ?>
                >
                <? if ($_GET['area-7']): ?>
                    <input type="hidden" name="area-7" id="area-7" value="true">
                <? endif; ?>
                <area data-index="area-8"
                      class="map-item"
                      shape="poly"
                      title="Нефтеюганский район"
                      alt="Нефтеюганский район"
                      href="#8"
                      coords="310,234.5,306,235.5,302,235.5,296,234.5,292,233.5,288,236.5,286,239.5,283,241.5,279,241.5,275,240.5,270,239.5,266,239.5,265,241.5,262,244.5,259,248.5,257,251.5,254,255.5,249,257.5,245,261.5,243,263.5,243,267.5,244,272.5,245,279.5,245,282.5,249,283.5,253,287.5,256,292.5,258,296.5,262,297.5,266,297.5,270,301.5,274,304.5,278,307.5,283,309.5,287,312.5,291,315.5,293,320.5,294,323.5,299,322.5,301,322.5,303,320.5,303,316.5,304,312.5,305,308.5,306,302.5,306,297.5,306,293.5,307,289.5,310,287.5,312,284.5,313,281.5,314,277.5,315,272.5,316,267.5,316,262.5,314,258.5,312,253.5,313,249.5,315,246.5,317,244.5,315,240.5,312,236.5"
                      <? if ($_GET['area-8']): ?>data-selected="selected"<? endif; ?>
                >
                <? if ($_GET['area-8']): ?>
                    <input type="hidden" name="area-8" id="area-8" value="true">
                <? endif; ?>
                <area data-index="area-9"
                      class="map-item"
                      shape="poly"
                      title="Нижневартовский район"
                      alt="Нижневартовский район"
                      href="#9"
                      coords="483,141,480,143,479,146,476,149,474,152,468,154,466,155,464,159,463,164,459,168,454,168,450,168,442,168,438,167,433,168,429,170,424,172,418,171,413,167,406,164,404,160,402,156,398,152,394,148,390,147,384,148,384,151,384,159,384,165,384,170,385,176,385,181,384,185,380,186,375,187,374,191,373,194,367,195,362,194,356,194,348,194,347,198,347,201,347,210,347,218,347,223,349,228,351,232,352,233,356,233,359,236,358,241,357,245,355,248,352,250,347,251,342,251,340,253,342,257,346,258,349,259,350,261,351,266,352,270,351,275,351,280,355,282,360,287,365,291,370,294,375,297,380,300,383,303,388,306,390,300,389,294,389,288,390,283,391,277,391,270,394,267,396,259,397,253,403,250,410,251,413,252,419,255,425,253,436,253,444,253,450,256,456,258,465,258,470,257,476,253,482,253,489,257,492,261,499,261,507,262,511,264,515,263,517,258,521,253,526,248,532,244,536,242,541,242,545,245,549,249,556,251,561,246,567,243,571,240,578,236,584,234,589,231,588,226,591,223,594,218,586,217,581,213,577,210,571,209,564,203,563,189,560,186,556,182,550,176,549,172,546,170,541,172,536,174,529,169,524,163,522,159,515,158,510,158,508,162,504,163,499,161,494,156,488,152,486,147,484,141"
                      <? if ($_GET['area-9']): ?>data-selected="selected"<? endif; ?>
                >
                <? if ($_GET['area-9']): ?>
                    <input type="hidden" name="area-9" id="area-9" value="true">
                <? endif; ?>
            </map>
        </div>
    </form>

<? $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "map",
    array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "FILTER_NAME" => "mapFilter",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => $arParams['IBLOCK_ID'],
        "IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "20",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Расписание",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
            0 => "age",
            1 => "hall",
            2 => "municipality",
            3 => "locality",
            4 => "",
        ),
        "SET_BROWSER_TITLE" => "Y",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "PROPERTY_date",
        "SORT_BY2" => "ID",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "DESC",
        "COMPONENT_TEMPLATE" => "map"
    ),
    false
); ?>

<script type="application/javascript">
    // ГАСТРОЛЬНАЯ КАРТА
    function move(e, b, r)	//для получения координат мышки
    {
        e = e || window.event;
        if (e.pageX == null && e.clientX != null) {
            var html = document.documentElement;
            var body = document.body;
            e.pageX = e.clientX + (html && html.scrollLeft || body && body.scrollLeft || 0) - (html.clientLeft || 0);
            e.pageY = e.clientY + (html && html.scrollTop || body && body.scrollTop || 0) - (html.clientTop || 0)
        }
        //устанавливаем тултип на уровне мышки
        var tool = $('.tool');
        tool.css('left', e.pageX + 15 + r + 'px');
        tool.css('top', e.pageY + 15 - b + 'px');
    }

    function out() {
        document.body.removeChild(tooltips);
    }

    var MAP = $('map area');
    MAP.hover(function () {
        $(".tool").remove();
    });

    function over(tip)	//функция при наведении
    {
        $('').appendTo('body').html(name);
        move(0, 0, 0);
    }

    // по клику работаем с фильтром
    MAP.on('click', function (e) {

        e.preventDefault();
        var data = $(this).mouseout().data('maphilight') || {};
        data.alwaysOn = !data.alwaysOn;
        $(this).data('maphilight', data).trigger('alwaysOn.maphilight');

        var area = $(this).data('index');
        if (data.alwaysOn) {
            $(this).attr('data-selected', 'selected');
            $('.map-map').append('<input type="hidden" name="' + area + '" id="' + area + '" value="true">');
        } else {
            $(this).removeAttr('data-selected');
            $('.map-map').find('#' + area).each(function () {
                $(this).remove();
            });
        }

        var municipality = $('#municipality');
        var arrActive = [];
        var count = 0;

        // отключаем все активные
        // municipality.selectMultiple('deselect_all');
        var findSTR = $(this).attr('title');
        var spanOfList = $('.ms-list > li > span');
        var newSTR = '';
        switch (findSTR) {
            case ('Ханты-Мансийский район'):
                newSTR = 'Ханты-Мансийск';
                municipality.find('option').each(function () {
                    if ($(this).text().indexOf(newSTR) !== -1) {
                        arrActive[count] = $(this).attr('value');
                        count++;
                        spanOfList.each(function () {
                            if ($(this).text().indexOf(newSTR) !== -1 && data.alwaysOn) {
                                $(this).parent().animatescroll({
                                    element: $(this).parent().parent()
                                });
                                return false;
                            }
                        });
                    }
                });
                break;
            case ('Сургутский район'):
                newSTR = 'Сургут';
                municipality.find('option').each(function () {
                    if ($(this).text().indexOf(newSTR) !== -1 || $(this).text().indexOf('Когалым') !== -1) {
                        arrActive[count] = $(this).attr('value');
                        count++;
                        spanOfList.each(function () {
                            if ($(this).text().indexOf(newSTR) !== -1 && data.alwaysOn) {
                                $(this).parent().animatescroll({
                                    element: $(this).parent().parent()
                                });
                                return false;
                            }
                        });
                    }
                });
                break;
            case ('Нефтеюганский район'):
                newSTR = 'Нефтеюганск';
                municipality.find('option').each(function () {
                    if ($(this).text().indexOf(newSTR) !== -1 || $(this).text().indexOf('Пыть-ях') !== -1) {
                        arrActive[count] = $(this).attr('value');
                        count++;
                        spanOfList.each(function () {
                            if ($(this).text().indexOf(newSTR) !== -1 && data.alwaysOn) {
                                $(this).parent().animatescroll({
                                    element: $(this).parent().parent()
                                });
                                return false;
                            }
                        });
                    }
                });
                break;
            case ('Нижневартовский район'):
                newSTR = 'Нижневартовск';
                municipality.find('option').each(function () {
                    if ($(this).text().indexOf(newSTR) !== -1 || $(this).text().indexOf('Лангепас') !== -1
                        || $(this).text().indexOf('Мегион') !== -1 || $(this).text().indexOf('Радужный') !== -1
                        || $(this).text().indexOf('Покачи') !== -1) {
                        arrActive[count] = $(this).attr('value');
                        count++;
                        spanOfList.each(function () {
                            if ($(this).text().indexOf(newSTR) !== -1 && data.alwaysOn) {
                                $(this).parent().animatescroll({
                                    element: $(this).parent().parent()
                                });
                                return false;
                            }
                        });
                    }
                });
                break;
            case ('Кондинский район'):
                newSTR = 'Урай';
                municipality.find('option').each(function () {
                    if ($(this).text().indexOf('Кондинский район') !== -1 || $(this).text().indexOf(newSTR) !== -1) {
                        arrActive[count] = $(this).attr('value');
                        count++;
                        spanOfList.each(function () {
                            if ($(this).text().indexOf(newSTR) !== -1 && data.alwaysOn) {
                                $(this).parent().animatescroll({
                                    element: $(this).parent().parent()
                                });
                                return false;
                            }
                        });
                    }
                });
                break;
            case ('Советский район'):
                newSTR = 'Югорск';
                municipality.find('option').each(function () {
                    if ($(this).text().indexOf('Советский район') !== -1 || $(this).text().indexOf(newSTR) !== -1) {
                        arrActive[count] = $(this).attr('value');
                        count++;
                        spanOfList.each(function () {
                            if ($(this).text().indexOf(newSTR) !== -1 && data.alwaysOn) {
                                $(this).parent().animatescroll({
                                    element: $(this).parent().parent()
                                });
                                return false;
                            }
                        });
                    }
                });
                break;
            case ('Октябрьский район'):
                newSTR = 'Нягань';
                municipality.find('option').each(function () {
                    if ($(this).text().indexOf('Октябрьский район') !== -1 || $(this).text().indexOf(newSTR) !== -1) {
                        arrActive[count] = $(this).attr('value');
                        count++;
                        spanOfList.each(function () {
                            if ($(this).text().indexOf(newSTR) !== -1 && data.alwaysOn) {
                                $(this).parent().animatescroll({
                                    element: $(this).parent().parent()
                                });
                                return false;
                            }
                        });
                    }
                });
                break;
            case ('Белоярский район'):
                municipality.find('option').each(function () {
                    if ($(this).text().indexOf(findSTR) !== -1) {
                        arrActive[count] = $(this).attr('value');
                        count++;
                        spanOfList.each(function () {
                            if ($(this).text().indexOf(findSTR) !== -1 && data.alwaysOn) {
                                $(this).parent().animatescroll({
                                    element: $(this).parent().parent()
                                });
                                return false;
                            }
                        });
                    }
                });
                break;
            case ('Березовский район'):
                municipality.find('option').each(function () {
                    if ($(this).text().indexOf(findSTR) !== -1) {
                        arrActive[count] = $(this).attr('value');
                        count++;
                        spanOfList.each(function () {
                            if ($(this).text().indexOf(findSTR) !== -1 && data.alwaysOn) {
                                $(this).parent().animatescroll({
                                    element: $(this).parent().parent()
                                });
                                return false;
                            }
                        });
                    }
                });
                break;
        }
        municipality.selectMultiple('select', arrActive);
    });

    $('.mapq').maphilight({
        strokeColor: '4a4639',
        fillColor: 'daac4f',
        fillOpacity: 0.5,
        strokeWidth: 2
    });

    // при загрузке страницы проверяем GET
    MAP.each(function () {
        var data = $(this).mouseout().data('maphilight') || {};
        if ($(this).attr('data-selected')) {
            data.alwaysOn = true;
            $(this).data('maphilight', data).trigger('alwaysOn.maphilight');
        }
    });

    // скролим фильтр для просмотра результатов
    //$('.timetable-block').animatescroll();
</script>
