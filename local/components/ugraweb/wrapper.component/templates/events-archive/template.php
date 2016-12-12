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

if (!CModule::IncludeModule("iblock"))
    return;

$ibEventsID 		= 	\UW\IBBase::getIBIdByCode("events");

// получим 6 месяцев для фильтрации (нынешний + 5 месяцев назад)
$arResult['MONTHS'][0]['DATE'] = date("m.Y");
$arResult['MONTHS'][0]['NAME'] = FormatDate("f", MakeTimeStamp(date("d.m.Y")));
for ($i = 1; $i < 6; $i++) {
    $dateSTR = '-' . $i . ' month';
    $arResult['MONTHS'][$i]['DATE'] = date("m.Y", strtotime($dateSTR));
    $arResult['MONTHS'][$i]['NAME'] = FormatDate("f", MakeTimeStamp(date("d.m.Y", strtotime($dateSTR))));
}
?>

<form name=FLT_EVENTS_LIST_FORM" method="get" action="<?=POST_FORM_ACTION_URI?>"
      enctype="multipart/form-data" class="filter-form">
    <div class="second-line">
        <div class="f-row">
            <label for="find_description">Искать в названии или описании события</label>
            <input name="find_description" value="<?=trim(htmlspecialcharsbx($_GET['find_description']))?>" type="text">
            <br /><br />
        </div>
    </div>
    <div class="second-line">
        <div class="label-name">Дата:</div>
        <ul class="dates">
            <li class="dates__item">
                <input type="text" value="<? if ($_GET['date_start']) echo $_GET['date_start'] ?>" name="date_start" id="date_start" title="">
            </li>
            <li class="dates__item">
                <input type="text" value="<? if ($_GET['date_end']) echo $_GET['date_end'] ?>" name="date_end" id="date_end" title="">
            </li>
        </ul>
        <ul class="categories" id="months">
            <? foreach ($arResult['MONTHS'] as $arMonth): ?>
                <li class="categories__item" value="<? echo $arMonth['DATE'] ?>">
                    <? echo $arMonth['NAME'] ?>
                </li>
            <? endforeach; ?>
        </ul>
    </div>
    <div class="filter-buttons">
        <div class="confirm">
            <input type="submit" name="set_filter" value="Применить">
        </div>
        <div class="reset"><a href="javascript:void(0)">Сбросить фильтр</a></div>
    </div>
</form>

<?
if (!empty($_GET['set_filter'])) {

    if (!empty($_GET['date_start']) && !empty($_GET['date_end']))
    {
        $dateStart = trim(htmlspecialcharsEx($_GET['date_start']));

        $arDateTo = explode('.', trim(htmlspecialcharsEx($_GET['date_end'])));
        $mDateTo = mktime(0, 0, 0, intval($arDateTo[1]), intval($arDateTo[0]) + 1, intval($arDateTo[2]));
        $dateTo = date('d.m.Y', $mDateTo);

        $GLOBALS['FLT_EVENTS_LIST'][] = [
            'LOGIC' => 'OR',
            // слева
            [
                '>=DATE_ACTIVE_FROM' => $dateStart,
                '<=DATE_ACTIVE_FROM' => $dateTo,
            ],
            // справа
            [
                '>=DATE_ACTIVE_TO' => $dateStart,
                '<=DATE_ACTIVE_TO' => $dateTo,
            ],
            // внутри
            [
                '<=DATE_ACTIVE_FROM' => $dateStart,
                '>=DATE_ACTIVE_TO' => $dateTo,
            ],
        ];
    }

    if (!empty($_GET['find_description']))
    {
        $find_description = trim(htmlspecialcharsbx($_GET['find_description']));
        $GLOBALS['FLT_EVENTS_LIST'][] = [
            'LOGIC' => 'OR',
            [
                'NAME' => '%'.$find_description.'%'
            ],
            [
                'DETAIL_TEXT' => '%'.$find_description.'%'
            ]
        ];
    }
}
if((MakeTimeStamp($_GET['date_end']) >= MakeTimeStamp(date('d.m.Y'))) || !strlen($_GET['date_end']))
{
    $GLOBALS['FLT_EVENTS_LIST']['<DATE_ACTIVE_TO'] = date('d.m.Y');
}
?>
<br>
<p><h4><a href="/events/">Предстоящие события</a></h4></p>
<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "events-archive",
    array(
        "ACTIVE_DATE_FORMAT" => "j F Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "N",
        "DETAIL_URL" => "/events/#CODE#/?back_url_arch=/events/archive/",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
            0 => "",
            1 => "ACTIVE_TO",
        ),
        "FILTER_NAME" => "FLT_EVENTS_LIST",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => $ibEventsID,
        "IBLOCK_TYPE" => "afisha",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "20",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Новости",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
            0 => "",
            1 => "age",
            2 => "date",
            3 => "hall",
            4 => "link_kassir",
            5 => "date_text",
        ),
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC",
        "COMPONENT_TEMPLATE" => "events-archive"
    ),
    false
);?>