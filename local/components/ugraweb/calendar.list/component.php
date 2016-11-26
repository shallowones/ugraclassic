<?
/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param CBitrixComponent $this
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

global $DB;
$cCurDate   = date("d.m.Y");
$arCurDate  = explode(".", $cCurDate);
$nDay       = intval($arCurDate[0]);
$nMonth     = intval($arCurDate[1]);
$DayCount   = intval($arParams['DAY_COUNT']);
$arDays     = Array();

/**
* 1 - Лента календаря
*/

if($DayCount > 0)
{
	for($count=0; $count < $DayCount; $count++)
    {
		$itemDay = date($DB->DateFormatToPHP(CLang::GetDateFormat("SHORT")), mktime(0,0,0,$nMonth,$nDay+$count,$arCurDate[2]));
		$arDays[$itemDay]["date"] = $itemDay;
		$arDays[$itemDay]["day"] = array_shift(explode(".", $itemDay));
		$DayItemWeek = FormatDate("D", MakeTimeStamp($itemDay));
        $arDays[$itemDay]["day_name"] = $DayItemWeek;
		$arDays[$itemDay]["weekend"] = ($DayItemWeek == "Сб" || $DayItemWeek == "Вс");
    }
}


/**
* 2 - События для ленты
*/

$arEvents = Array();
$mCurDate = MakeTimeStamp($cCurDate);
$arSort = Array("PROPERTY_date"=>"asc");

$arSelect = Array("IBLOCK_ID","ID","NAME","DETAIL_PAGE_URL");

// Фильтр	
$arFilter=Array(
	"IBLOCK_ID"=>1,
	"ACTIVE"=>"Y",
);
$arFilter[">=PROPERTY_date_VALUE"] = date($DB->DateFormatToPHP(CLang::GetDateFormat("SHORT")), $mCurDate);


// Запрос

$rsEvents=CIBlockElement::GetList($arSort, $arFilter, false, Array("nTopCount" => 100), $arSelect);
while($obEvents = $rsEvents->GetNextElement())
{
    $arFields = $obEvents->GetFields();
    $arProps = $obEvents->GetProperties();
    $arDate = explode(" ", $arProps['date']['VALUE']);

    $cTime = explode(":", $arDate[1]);
    $cNameDay = FormatDate("l", MakeTimeStamp($arDate[0]));
    $cNameDay = ToLower($cNameDay);

    $arEvents[$arDate[0]][] = Array(
        "id" => $arFields["ID"],
        "date" => $arProps['date']['VALUE'],
        "name" => $arFields["NAME"],
        "date_event_format" => ($cTime[0].":".$cTime[1]),
        "url" => $arFields["DETAIL_PAGE_URL"],
    );
}

foreach($arDays as $key => $arDay)
{
	if(isset($arEvents[$key]))
    {
		$arDays[$key]["events"] = $arEvents[$key];
    }
}

$arResult["Days"] = $arDays;

$this->IncludeComponentTemplate();
?>