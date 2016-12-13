<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" id="afisha_filter">
	<?foreach($arResult["ITEMS"] as $arItem):
		if(array_key_exists("HIDDEN", $arItem)):
			echo $arItem["INPUT"];
		endif;
	endforeach;?>
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?if(!array_key_exists("HIDDEN", $arItem)):?>
				<?if($arItem["INPUT_NAME"] == $arResult["FILTER_NAME"]."_pf[date]"):?>
					<?/*=========================================================
						START Фильтр для афиши

						$_REQUEST["sdate"] - начало временного диапазона в формате Y-m-d (ex. 2016-10-05)
						$_REQUEST["edate"] - конец временного диапазона в формате Y-m-d
						Если обе переменные пустые - то задается только начало диапазона (от текущей даты).

						АХТУНГ! Для работы используется серверное время. Возможна ситуация, когда на сервере часовой пояс задан, например, по мск,
						тогда значения в фильтре обновятся на 2 часа позже (для Хантов)
					=========================================================*/
					CJSCore::Init(array('popup', 'date')); // Без этого не работает календарь у не_администраторов

					if (!empty($_REQUEST["sdate"])) $sdate = htmlspecialcharsbx($_REQUEST["sdate"]);	
					if (!empty($_REQUEST["edate"])) $edate = htmlspecialcharsbx($_REQUEST["edate"])." 23:23:23";

					$currentDay 	= date("Y-m-d", strtotime("today"));
					$nextDay 		= date("Y-m-d", strtotime("+1 day"));
					$currentWeek	= date("Y-m-d", strtotime("Sunday")); // date("Y-m-d", strtotime("+7 day"));
					$correntMonth	= date("Y-m-d", strtotime("last day of this month")); // date("Y-m-d", strtotime("+30 day"));

					!empty($sdate) ?: $sdate = $currentDay;

					$GLOBALS[$arResult["FILTER_NAME"]] = array_merge_recursive($GLOBALS[$arResult["FILTER_NAME"]], Array("PROPERTY" => Array(">=date" => $sdate, "<=date" => $edate)));

					$sdate_for_input = (new DateTime($sdate))->format('d.m.Y');
					$edate_for_input = !empty($edate) ? (new DateTime($edate))->format('d.m.Y') : '';
					?>

					<div class="filter-datepicker-box">
						Дата:
						<div class="date-picker">от<input type="text" value="<?=$sdate_for_input?>" onfocus="$('.sdate_calendar').click()" id="sdate_picker" />
						<span  onclick="BX.calendar({node:this, field:'sdate_picker', form: 'filter', bTime: false, callback_after: function(){$('#submitfilter').click()} });" class="sdate_calendar hidden-picker"></span><div class="picker-ico" onclick="$('.sdate_calendar').click()"></div></div><div class="date-picker">до<input type="text" value="<?=$edate_for_input?>" onfocus="$('.edate_calendar').click()" id="edate_picker" />
						<span  onclick="BX.calendar({node:this, field:'edate_picker', form: 'filter', bTime: false, callback_after: function(){$('#submitfilter').click()} });" class="edate_calendar hidden-picker"></span><div class="picker-ico" onclick="$('.edate_calendar').click()"></div></div>
					</div>

					<?if (($_REQUEST["sdate"] == $currentDay) && ($_REQUEST["edate"] == $currentDay)):?>
						<div class="datefilter_point first-datefilter">сегодня</div>
					<?else:?>
						<a href="?sdate=<?=$currentDay?>&edate=<?=$currentDay?>" onclick="$('#submitfilter').click()"><div class="datefilter_point first-datefilter">сегодня</div></a>
					<?endif;?>

					<?if (($_REQUEST["sdate"] == $nextDay) 	&& ($_REQUEST["edate"] == $nextDay)):?>
						<div class="datefilter_point">завтра</div>
					<?else:?> 
						<a href="?sdate=<?=$nextDay?>&edate=<?=$nextDay?>" onclick="$('#submitfilter').click()"><div class="datefilter_point">завтра</div></a>
					<?endif;?>

					<?if (($_REQUEST["sdate"] == $currentDay) && ($_REQUEST["edate"] == $currentWeek)):?>
						<div class="datefilter_point">на этой неделе</div>
					<?else:?> 
						<a href="?sdate=<?=$currentDay?>&edate=<?=$currentWeek?>" onclick="$('#submitfilter').click()"><div class="datefilter_point">на этой неделе</div></a>
					<?endif;?>
					
					<?if (($_REQUEST["sdate"] == $currentDay) && ($_REQUEST["edate"] == $correntMonth)):?>
						<div class="datefilter_point last-datefilter">в этом месяце</div>
					<?else:?>
						<a href="?sdate=<?=$currentDay?>&edate=<?=$correntMonth?>" onclick="$('#submitfilter').click()"><div class="datefilter_point last-datefilter">в этом месяце</div></a>
					<?endif;?>

					<input type="hidden" value="<?=$sdate?>" name="sdate" id="sdate_picker_hidden" />
					<input type="hidden" value="<?=$edate?>" name="edate" id="edate_picker_hidden" />
					<div class="clrb"></div>
					<?
					/*=========================================================
						END Фильтр для афиши
					=========================================================*/
					?>
				<?else:?>
					<?=$arItem["NAME"]?>:
					<?=$arItem["INPUT"]?>
				<?endif?>
				
			<?endif?>
		<?endforeach;?>

		<input type="submit" id="submitfilter" onclick="prepare_date()" name="set_filter" value="<?=GetMessage("IBLOCK_SET_FILTER")?>" style="display:none"/><input type="hidden" name="set_filter" value="Y" />&nbsp;&nbsp;<input type="submit" name="del_filter" value="<?=GetMessage("IBLOCK_DEL_FILTER")?>" style="display:none"/>
</form>
<div class="clrb"></div>