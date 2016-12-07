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
<form  name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" enctype="multipart/form-data" class="filter-form">
	<div class="filter-line">
		<div class="first">
			<label class="label-name" for="filter-event">Название мероприятия:</label>
			<input type="text" name="arrFilter_ff[NAME]" value="<?=$_GET["arrFilter_ff"]['NAME']?>">
		</div>
		<div class="second">
			<ul class="dates">
				<li class="dates__item">
					<input type="text" id="arrFilter_DATE_ACTIVE_FROM_1" value="<?=$_GET["arrFilter_DATE_ACTIVE_FROM_1"]?>" name="arrFilter_DATE_ACTIVE_FROM_1" title="">
				</li>
				<li class="dates__item">
					<input type="text" id="arrFilter_DATE_ACTIVE_FROM_2" value="<?=$_GET["arrFilter_DATE_ACTIVE_FROM_2"]?>" name="arrFilter_DATE_ACTIVE_FROM_2" title="">
				</li>
			</ul>
		</div>
		<div class="third">
			<label class="label-name" for="filter-year">Год:</label>
			<select name="filter-year" id="filter-year">
				<option value=""></option>
				<?foreach ($arResult["years"] as $y){?>
				<option value="<?=$y?>"><?=$y?></option>
				<?}?>
			</select>
		</div>
	</div>
	<div class="filter-buttons">
		<div class="confirm">
			<input type="submit" name="set_filter" value="Применить">
			<input type="hidden" name="set_filter" value="Y" />
		</div>
		<div class="reset">
			<a href="javascript:void(0)">Сбросить фильтр</a>
		</div>
	</div>
</form>
<script>
	$(function(){
		$('#filter-year').change(function(e){
			var year = $('select option:selected').val();
			$('#arrFilter_DATE_ACTIVE_FROM_1').val('01.01.' + year);
			$('#arrFilter_DATE_ACTIVE_FROM_2').val('31.12.' + year);
		});
	});
</script>