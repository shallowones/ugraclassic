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
            <? $APPLICATION->IncludeComponent("bitrix:main.include",
                "",
                array(
                    "PATH" => $componentPath . "/include/map.php",
                    "AREA_FILE_SHOW" => "file"
                )
            ); ?>
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

    // скролим фильтр для просмотра результатов
    //$('.timetable-block').animatescroll();
</script>
