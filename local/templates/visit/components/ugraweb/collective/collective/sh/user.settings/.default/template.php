<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

	
function PrintCareerItem($arCareer, $count, $total)
{ ?>
	<div class="item-career" id="item-career-<?=$count?>">
		<input type="hidden" name="CARRER_ID[]" value="<?=$arCareer['ID']?>" class="career_id" />
		<div class="form-line form-line_w_fluid">
			<div class="form-line__cel form-line__cel_lt_left">
				<label for="sp-institution-name<?=$count?>" class="form-label">Название учреждения</label>
			</div>
			<div class="form-line__cel form-line__cel_lt_right">
				<input type="text" name="UF_COMPANY[]" id="sp-institution-name<?=$count?>" value='<?=$arCareer['UF_COMPANY']?>' class="form-input form-input_w_fluid cl_institution_name">
			</div>
		</div><!-- form-line -->
		
		<div class="form-line form-line_w_fluid">
			<div class="form-line__cel form-line__cel_lt_left">
				<label for="sp-position<?=$count?>" class="form-label">Должность</label>
			</div>
			<div class="form-line__cel form-line__cel_lt_right">
				<input type="text" name="UF_POSITION[]" id="sp-position<?=$count?>" value="<?=$arCareer['UF_POSITION']?>" class="form-input form-input_w_fluid cl_sp_position">
			</div>
		</div><!-- form-line -->
		
		<div class="form-line form-line_w_fluid">
			<div class="form-line__cel form-line__cel_lt_left">
				<span class="form-label">Период</span> 
			</div>
			<div class="form-line__cel form-line__cel_lt_right">
				<label for="sp-date<?=$count?>_no-end" class="checkbox js-checkbox js-dop-chk">
					<input type="checkbox" name="UF_ACTUAL[]" id="sp-date<?=$count?>_no-end" data-disable-input="spa-end-date<?=$count?>" value="<?=($arCareer['UF_ACTUAL']=='Y')?'Y':'N'?>" <?=($arCareer['UF_ACTUAL']=='Y')?'checked="checked"':''?> class="js-disable-input">
					Я работаю здесь по настоящее время.
				</label>
			</div>
		</div><!-- form-line -->
		
		<div class="form-line form-line_w_fluid">
			<div class="form-line__cel form-line__cel_lt_left">
				<label for="spa-beg-date<?=$count?>" class="form-label">Дата начала работы</label>
			</div>
			<div class="form-line__cel form-line__cel_lt_right">
				
				<div class="form-el-group">
					<div class="form-el-group__i">
						<input type="text" name="UF_BEGIN_DATE[]" id="spa-beg-date<?=$count?>" value="<?=$arCareer['BEGIN_DATE_VALUE']?>" class="form-input form-input_w_date js-datepicker cl_spa_beg_date" readonly>
						<div class="form-legend form-legend_space_bot">Дата начала работы</div>
					</div><!-- form-el-group__i -->
					<div class="form-el-group__i">
						<input type="text" name="UF_END_DATE[]" id="spa-end-date<?=$count?>" value="<?=$arCareer['END_DATE_VALUE']?>" class="form-input form-input_w_date js-datepicker cl_spa_end_date" readonly>
						<div class="form-legend form-legend_space_bot">Дата окончания</div>
					</div><!-- form-el-group__i -->
				</div><!-- form-el-group -->
				
				<div <?if($total == 1):?>style="display:none;"<?endif;?>>
					<span class="icon-button icon-button_tp_del remove_career" id="remove_career_<?=$count?>">Удалить это место работы</span>
				</div>
				
			</div><!-- form-line__cel -->
		</div><!-- form-line -->	
		<input type="hidden" class="career_set_delete" name="career_set_delete[]" value="N">
	</div>
<?}


function PrintEducationItem($arEducation, $count, $total)
{ ?>
	<div class="item-education" id="item-education-<?=$count?>">
		<input type="hidden" name="EDUCATION_ID[]" value="<?=$arEducation['ID']?>" class="education_id" />
		<div class="form-line form-line_w_fluid">
			<div class="form-line__cel form-line__cel_lt_left">
				<label for="sp-university-name<?=$count?>" class="form-label">Название учреждения</label>
			</div>
			<div class="form-line__cel form-line__cel_lt_right">
				<input type="text" name="UF_EDU_COMPANY[]" id="sp-university-name<?=$count?>" value="<?=$arEducation['UF_EDU_COMPANY']?>" class="form-input form-input_w_fluid cl_university_name">
			</div>
		</div><!-- form-line -->
		
		<div class="form-line form-line_w_fluid">
			<div class="form-line__cel form-line__cel_lt_left">
				<label for="sp-specialty<?=$count?>" class="form-label">Специальность</label>
			</div>
			<div class="form-line__cel form-line__cel_lt_right">
				<input type="text" name="UF_SPECIALTY[]" id="sp-specialty<?=$count?>" value="<?=$arEducation['UF_SPECIALTY']?>" class="form-input form-input_w_fluid cl_specialty">
			</div>
		</div><!-- form-line -->
		
		<div class="form-line form-line_w_fluid">
			<div class="form-line__cel form-line__cel_lt_left">
				<label for="sp-period<?=$count?>" class="form-label">Период</label>
			</div>
			<div class="form-line__cel form-line__cel_lt_right">
				
				<div class="form-el-group">
					<div class="form-el-group__i">
						<input type="text" name="UF_BEGIN_YEAR[]" id="sp-beg-period<?=$count?>" value="<?=$arEducation['UF_BEGIN_YEAR']?>" class="form-input form-input_w_year cl_beg_period">
						<span class="form-txt">—</span>
						<input type="text" name="UF_END_YEAR[]" id="sp-end-period<?=$count?>" value="<?=$arEducation['UF_END_YEAR']?>" class="form-input form-input_w_year cl_end_period">
						<div class="form-legend form-legend_space_bot">Годы начала и окончания обучения</div>
					</div>	
				</div><!-- form-el-group -->

				<div <?if($total == 1):?>style="display:none;"<?endif;?>>
					<span class="icon-button icon-button_tp_del remove_education" id="remove_education_<?=$count?>">Удалить это образование</span>
				</div>
				
			</div><!-- form-line__cel -->
		</div><!-- form-line -->
		<input type="hidden" class="education_set_delete" name="education_set_delete[]" value="N">
	</div>
<?}?>

<div class="form form_space_bot form_space_top">
	<?ShowError($arResult["strProfileError"]);?>
	<?
	if ($arResult['DATA_SAVED'] == 'Y' || $_SESSION["SETTINGS_DATA_SAVED"] == 'Y')
		ShowNote(GetMessage('PROFILE_DATA_SAVED'));
		$_SESSION["SETTINGS_DATA_SAVED"] = false;
		
	if($_GET["required_fields"] == "Y") {
	?>
		<div style="background-color:#f9d4d7;padding:9px;margin-bottom:7px;border-bottom: 1px solid #c7bdbe;">
		<span class="error__h font-2">Внимание!</span> У вас заполнены не все обязательные поля. Пожалуйста, просмотрите форму ниже и заполните обязательные поля.
		</div>
	<?
	}
	?>

	<form method="post" name="form1" id="form1-settings" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
	<?=$arResult["BX_SESSION_CHECK"]?>
	<input type="hidden" name="settings_type" value="info" />
	<input type="hidden" name="lang" value="<?=LANG?>" />
	<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
	<input type="hidden" name="LOGIN" value=<?=$arResult["LOGIN"]?> />
	<input type="hidden" name="EMAIL" value=<?=$arResult["EMAIL"]?> />

	
	<?// Основные данные ///////////////////////////////////////////////////////////////////////////////////?>
	<h2 class="form-h form-h_stl_bordered">Основные данные</h2>
	
	<div class="form-line form-line_w_fluid">
		<div class="form-line__cel form-line__cel_lt_left">
			<label for="sp-surname" class="form-label"><?=GetMessage('LAST_NAME')?><span class="required-mark">*</span></label>
		</div>
		<div class="form-line__cel form-line__cel_lt_right">
			<input type="text" name="LAST_NAME" id="sp-surname" value="<?=$arResult["arUser"]["LAST_NAME"]?>" class="form-input form-input_w_fluid">
		</div>
	</div><!-- form-line -->
	
	<div class="form-line form-line_w_fluid">
		<div class="form-line__cel form-line__cel_lt_left">
			<label for="sp-name" class="form-label"><?=GetMessage('NAME')?><span class="required-mark">*</span></label>
		</div>
		<div class="form-line__cel form-line__cel_lt_right">
			<input type="text" name="NAME" id="sp-name" value="<?=$arResult["arUser"]["NAME"]?>" class="form-input form-input_w_fluid">
		</div>
	</div><!-- form-line -->
	
	<div class="form-line form-line_w_fluid">
		<div class="form-line__cel form-line__cel_lt_left">
			<label for="sp-patronymic" class="form-label"><?=GetMessage('SECOND_NAME')?><span class="required-mark">*</span></label>
		</div>
		<div class="form-line__cel form-line__cel_lt_right">
			<input type="text" name="SECOND_NAME" id="sp-patronymic" value="<?=$arResult["arUser"]["SECOND_NAME"]?>" class="form-input form-input_w_fluid">
		</div>
	</div><!-- form-line -->
	
	<div class="form-line form-line_w_fluid">
		<div class="form-line__cel form-line__cel_lt_left">
			<span class="form-label"><?=GetMessage("USER_PHOTO")?></span>
		</div>
		<div class="form-line__cel form-line__cel_lt_right">
						
			<div class="ava-dif-sizes" <?if(strlen($arResult["arUser"]["PERSONAL_PHOTO"]) < 1):?>style="display:none;"<?endif;?>>
				<div class="ava-dif-sizes__i">
					<?=$arResult["arUser"]["PERSONAL_PHOTO_HTML_O"]?>
					<div class="ava-dif-sizes__h">Оригинал</div>
				</div>
				<div class="ava-dif-sizes__i">
					<?=$arResult["arUser"]["PERSONAL_PHOTO_HTML_75"]?>
					<div class="ava-dif-sizes__h">75x75</div>
				</div>
				<div class="ava-dif-sizes__i">
					<?=$arResult["arUser"]["PERSONAL_PHOTO_HTML_50"]?>
					<div class="ava-dif-sizes__h">50x50</div>
				</div>
				<div class="ava-dif-sizes__i">
					<?=$arResult["arUser"]["PERSONAL_PHOTO_HTML_25"]?>
					<div class="ava-dif-sizes__h">25x25</div>
				</div>
			</div><!-- ava-dif-sizes -->			
			
			<span class="icon-button icon-button_tp_user file-upload">Выбрать другой файл</span>
			<div class="file-name" id="ava-fn" style="display:none;"></div>
			<div class="file-load" id="ava-fl" style="display: none;">Загрузка...</div>
			<input type="hidden" name="file_id" id="ava-fid" value="<?=$arResult["arUser"]["PERSONAL_PHOTO"]?>">

			
			
		</div>
	</div><!-- form-line -->
						
	<div class="separator separator_space_more"></div>
	
	
	<?// Основное место работ //////////////////////////////////////////////////////////////////////////////?>
	<h2 class="form-h">Основное место работы</h2>
	
	<div class="form-line form-line_w_fluid">
		<div class="form-line__cel form-line__cel_lt_left">
			<label for="sp-institution-name" class="form-label">Название учреждения</label>
		</div>
		<div class="form-line__cel form-line__cel_lt_right">
			<input type="text" name="WORK_COMPANY" id="sp-institution-name" value="<?=$arResult["arUser"]["WORK_COMPANY"]?>" class="form-input form-input_w_fluid">
		</div>
	</div><!-- form-line -->
	
	<div class="form-line form-line_w_fluid">
		<div class="form-line__cel form-line__cel_lt_left">
			<label for="sp-position" class="form-label">Должность</label>
		</div>
		<div class="form-line__cel form-line__cel_lt_right">
			<input type="text" name="WORK_POSITION" id="sp-position" value="<?=$arResult["arUser"]["WORK_POSITION"]?>" class="form-input form-input_w_fluid">
		</div>
	</div><!-- form-line -->
	
	<div class="form-line form-line_w_fluid">
		<div class="form-line__cel form-line__cel_lt_left">
			<label for="sp-date" class="form-label">Дата начала работы</label>
		</div>
		<div class="form-line__cel form-line__cel_lt_right">
			<input type="text" name="UF_BEGIN_WORK" id="sp-date" value="<?=$arResult["arUser"]["UF_BEGIN_WORK"]?>" class="form-input form-input_w_date js-datepicker" readonly>
		</div>
	</div><!-- form-line -->
	
	<div class="separator separator_space_more"></div>

	<?// Карьера //////////////////////////////////////////////////////////////////////////////?>
	<div class="folding js-folding" id="folding_career">
		<div class="folding__h js-folding__ctrl"><span class="folding__h-txt font-2">Карьера</span> (опционально)</div>
		<div class="folding__body">
			<?$count = 0; $total = count($arResult['CAREER']);?>
			<?if($total > 0):?>
				<?foreach($arResult['CAREER'] as $arCareer):?>
					<?$count++;?>
					
					<?if($count > 1):?>
					<div class="separator separator_<?=$count?>"></div>
					<?endif;?>
									
					<?echo PrintCareerItem($arCareer, $count, $total)?>
					
				<?endforeach;?>
			<?else:?>
				<?$count++;?>
				<?echo PrintCareerItem(Array(), $count, 1)?>
			<?endif;?>
			
			<div class="separator"></div>
			
			<span class="icon-button icon-button_tp_add" id="add-item-career" data-add-career="<?=($count+1)?>">Добавить еще место работы</span>
		</div><!-- folding__body -->
	</div><!-- folding -->

	<?// Образование //////////////////////////////////////////////////////////////////////////////?>
	<div class="folding js-folding" id="folding_education">
		<div class="folding__h js-folding__ctrl"><span class="folding__h-txt font-2">Образование</span> (опционально)</div>
		<div class="folding__body">
			<?$count = 0; $total = count($arResult['EDUCATION']);?>
			<?if($total > 0):?>
				<?foreach($arResult['EDUCATION'] as $arEducation):?>
					<?$count++;?>
					
					<?if($count > 1):?>
					<div class="separator separator_<?=$count?>"></div>
					<?endif;?>
							
					<?echo PrintEducationItem($arEducation, $count, $total)?>

				<?endforeach;?>
			<?else:?>
				<?$count++;?>
				<?echo PrintEducationItem(Array(), $count, 1)?>
			<?endif;?>
			<div class="separator"></div>
			
			<span class="icon-button icon-button_tp_add" id="add-item-education" data-add-education="<?=($count+1)?>">Добавить образование</span>
			
		</div><!-- folding__body -->
	</div><!-- folding -->
										
	<?// Профессиональные навыки //////////////////////////////////////////////////////////////////////////////?>
	<div class="folding js-folding" id="folding_professional">
		<div class="folding__h js-folding__ctrl"><span class="folding__h-txt font-2">Профессиональные навыки</span> (опционально)</div>
		<div class="folding__body">
		
			<div class="form-line form-line_w_fluid">
				<div class="form-line__cel form-line__cel_lt_left">
					<label for="sp-career" class="form-label">Род деятельности (статус)<span class="required-mark">*</span></label>
				</div>
				<div class="form-line__cel form-line__cel_lt_right" id="work_profile_inner">
					<?$cVal = "";
					$count = 0;
					$total = count($arResult["arUser"]['UF_WORK_PROFILE']);
					if($total > 0):
						foreach($arResult["arUser"]['UF_WORK_PROFILE'] as $WorkProfile):
							$count++;
							$cVal .= trim($WorkProfile);
							if($count < $total):
								$cVal .= ", ";
							endif;
						endforeach;
					endif;?>
					<input type="text" name="sp-career" id="str_work_profile" value="<?=$cVal?>" class="form-input form-input_w_fluid js-custom-tags-st">
					<div class="form-legend">Не больше трех</div>
				</div><!-- form-line__cel -->
			</div><!-- form-line -->
			
			<div class="form-line form-line_w_fluid">
				<div class="form-line__cel form-line__cel_lt_left">
					<label for="sp-specialization" class="form-label">Специализация</label>
				</div>
				<div class="form-line__cel form-line__cel_lt_right" id="tags_inner">
										
					<div class="form-fluid-col">
						<div class="form-fluid-col__fluid">
							<select id="sp-specialization" name="temp_specialism" class="js-custom-select"  style="width:100%; display: inline-block;">
								<option value=""></option>
								<?foreach($arResult['DIRECTORY_SPECIALISM'] as $arDirectorySpecialism):?>
									<option value="<?=$arDirectorySpecialism["ID"]?>"><?=$arDirectorySpecialism["UF_SPECIALISM"]?></option>
								<?endforeach;?>
							</select>
							
							<div class="form-legend form-legend_space_bot">Не больше трех</div>
						</div><!-- form-fluid-col__fluid -->
						<div class="form-fluid-col__fix-w">
							<div class="form-fluid-col__fix-w-in">
								<input type="text" name="temp_experience" id="sp-experience" value="" class="form-input form-input_w_number">
								<span class="icon-button icon-button_space_left icon-button_tp_add" id="add_specialism">Добавить</span>
								<div class="form-legend form-legend_space_bot">Стаж</div>
							</div><!-- form-fluid-col__fix-w-in -->
						</div><!-- form-fluid-col__fix-w -->
						<div class="clearfix-block"></div>
					</div><!-- form-fluid-col -->
					
					<?if(is_array($arResult['SPECIALISM'])):?>
						<?foreach($arResult['SPECIALISM'] as $arSpecialism):?>
							<div class="tag" id="sdid_<?=$arResult['DIRECTORY_SPECIALISM'][$arSpecialism["UF_SPECIALISM_ID"]]["ID"]?>">
								<span class="tag__del">&nbsp;</span><span class="tag__body"><?=$arResult['DIRECTORY_SPECIALISM'][$arSpecialism["UF_SPECIALISM_ID"]]["UF_SPECIALISM"]?> (стаж <?=$arSpecialism["UF_EXPERIENCE"]?> <?=ShService::getNumEnding($arSpecialism["UF_EXPERIENCE"], Array("год","года","лет"))?>)</span>
								<input type="hidden" name="UF_SPECIALISM[]" value="<?=$arResult['DIRECTORY_SPECIALISM'][$arSpecialism["UF_SPECIALISM_ID"]]["ID"]?>">
								<input type="hidden" name="UF_EXPERIENCE[]" value="<?=$arSpecialism["UF_EXPERIENCE"]?>">
							</div><!-- tag -->
						<?endforeach;?>
					<?endif;?>
					
				</div><!-- form-line__cel -->
			</div><!-- form-line -->
			
		</div><!-- folding__body -->
	</div><!-- folding -->
			
	<?// Личные данные //////////////////////////////////////////////////////////////////////////////?>
	<div class="folding js-folding" id="folding_personal">
		<div class="folding__h js-folding__ctrl"><span class="folding__h-txt font-2">Личные данные</span> (опционально)</div>
		<div class="folding__body">
		
			<div class="form-line form-line_w_fluid">
				<div class="form-line__cel form-line__cel_lt_left">
					<label for="sp-lbl-birthday" class="form-label"><?=GetMessage("USER_BIRTHDAY_DT")?> (<?=$arResult["DATE_FORMAT"]?>)<span class="required-mark">*</span></label>
				</div>
				<div class="form-line__cel form-line__cel_lt_right">
					<input type="text" name="PERSONAL_BIRTHDAY" id="sp-birthday" value="<?=$arResult["arUser"]["PERSONAL_BIRTHDAY"]?>" class="form-input form-input_w_date js-datepicker" readonly>
				</div>
			</div><!-- form-line -->
		
			<div class="form-line form-line_w_fluid">
				<div class="form-line__cel form-line__cel_lt_left">
					<label for="sp-user-about" class="form-label form-label_width_same"><?=GetMessage("USER_NOTES")?></label>
				</div>
				<div class="form-line__cel form-line__cel_lt_right">
					<textarea name="PERSONAL_NOTES" id="sp-user-about" cols="40" rows="5" class="form-input form-input_w_fluid"><?=$arResult["arUser"]["PERSONAL_NOTES"]?></textarea>
					<div class="form-legend">Рассказ о себе в свободной форме</div>
				</div>
			</div><!-- form-line -->
		
			<div class="form-line form-line_w_fluid">
				<div class="form-line__cel form-line__cel_lt_left">
					<span class="form-label form-label_width_same"><?=GetMessage('USER_GENDER')?><span class="required-mark">*</span></span> 
				</div>
				<div class="form-line__cel form-line__cel_lt_right">
					
					<label for="sp-sex-1" class="radio js-radio">
					<input type="radio" name="PERSONAL_GENDER" id="sp-sex-1" value="M" <?=$arResult["arUser"]["PERSONAL_GENDER"] == "M" || empty($arResult["arUser"]["PERSONAL_GENDER"]) ? " checked=\"checked\"" : ""?>>
						<?=GetMessage("USER_MALE")?>
					</label>
					<label for="sp-sex-2" class="radio js-radio">
					<input type="radio" name="PERSONAL_GENDER" id="sp-sex-2" value="F" <?=$arResult["arUser"]["PERSONAL_GENDER"] == "F" ? " checked=\"checked\"" : ""?>>
						<?=GetMessage("USER_FEMALE")?>
					</label>

				</div>
			</div><!-- form-line -->
		
		</div><!-- folding__body -->
	</div><!-- folding -->
	
	<?// Местоположение //////////////////////////////////////////////////////////////////////////////?>
	<div class="folding js-folding" id="folding_location">
		<div class="folding__h js-folding__ctrl"><span class="folding__h-txt font-2">Местоположение</span> (опционально)</div>
		<div class="folding__body">
			<div class="form-line form-line_w_fluid">
				<div class="form-line__cel form-line__cel_lt_left">
					<label for="sp-lbl-location" class="form-label">Выберите из списка<span class="required-mark">*</span></label>
				</div>
				<div class="form-line__cel form-line__cel_lt_right">
					<select id="sp-location" name="UF_CITY_ID" class="js-custom-select-citys"  style="width:100%">
						<option value="">- не выбрано -</option>
						<?foreach($arResult['CITYS'] as $arCity):?>		
							<option value="<?=$arCity["CITY_ID"]?>" <?if($arResult["arUser"]["UF_CITY_ID"] == $arCity["CITY_ID"]):?>selected=""<?endif;?> data-region="<?=$arCity["REGION_NAME"]?>"><?=$arCity["CITY_NAME"]?></option>
						<?endforeach;?>
					</select>
                    <div class="form-legend"><b>В поле поиска <u>Берёзовский район</u> необходимо набирать с буквой <span style="color:red">ё</span>. <br />Если Вашего населенного пункта нет, необходимо указывать <span style="color:red">район</span>.</b></div>
				</div><!-- form-line__cel -->
			</div><!-- form-line -->
		</div><!-- folding__body -->
	</div><!-- folding -->
	
	<input type="hidden" name="save" value="Сохранить">
	<input type="button" name="save-button" value="Сохранить" class="button" id="save-settings">
	
	<br /><br />
	<div class="form-line">
		<span class="required-mark">*</span> &mdash; поля, обязательные для заполнения
	</div>

	</form>
</div><!-- form -->


<script>
	var dir_work_prof = <?=CUtil::PhpToJSObject($arResult['DIR_WORK_PROF'], false, true);?>;

	$(function() {

		//--Datepicker initialization
		var pickerOpts = {
			showOn: "both",
			closeText: 'Закрыть',
			prevText: '&#x3c;Пред',
			nextText: 'След&#x3e;',
			currentText: 'Сегодня',
			monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
			'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
			monthNamesShort:  ['Январь','Февраль','Март','Апрель','Май','Июнь',
			'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
			dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
			dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
			dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
			dateFormat: 'dd.mm.yy',
			firstDay: 1,
			isRTL: false,
			changeMonth: true,
			changeYear: true,
			yearRange: "-100:+0"
		};	
	
		init_ava_load('<?=$arResult["ID"]?>'); //-- Загрузка аватарки
		init_career_action(pickerOpts); //-- Действия с карьерой
		init_education_action(); //-- Действия с образованием
		init_specialism_action(); //-- Действия со специализацией		
		init_click_submit(); //-- Обработка нажатия submit
		init_field_select2('.js-custom-tags-st');
		
		$(".js-custom-select-citys").select2({
			width: 'copy',
			formatResult: format,
		});

	});
	
	function format(state) {
		var originalOption = state.element;
		var NameRegion = $(originalOption).data('region');
		
		if(typeof(NameRegion) !== 'undefined') {
			return state.text+'<br /><span style="font-size:10px;">'+NameRegion+'</span>';
		}
		else {
			return state.text;
		}
	}
	
	function init_click_submit() {
		
		var bValidate = is_validate_fields(); //-- Валидация полей

		$('#save-settings').click(function(event) {
			var bClickValidate = is_click_validate_fields('N'); //-- Валидация полей после нажатия "сохранить"
			
			if(bValidate && bClickValidate) {
				$('input').removeAttr('disabled'); // чтобы все в post отправилось
				$('.js-disable-input').attr('checked','checked'); // чтобы передались все галочки "Я работаю здесь по настоящее время"
				
				prepare_work_profile(); //-- Подтготовка к сохранению рода деятельности
				
				$('#form1-settings').submit();
			}
		});
	};
	
	function ClearCopyError(control) {
		if(control.parent().attr('class') == 'error error_w_fluid') {
			control.removeClass('form-input_stt_error');			
			control.parent().find('.error__popup').remove();
			control.unwrap();
		}
	}
	
</script>
<script type="text/javascript" src="/local/components/sh/user.settings/js/ava_load.js?<?=time()?>"></script>
<script type="text/javascript" src="/local/components/sh/user.settings/js/career_action.js?<?=time()?>"></script>
<script type="text/javascript" src="/local/components/sh/user.settings/js/education_action.js?<?=time()?>"></script>
<script type="text/javascript" src="/local/components/sh/user.settings/js/work_profile_action.js?<?=time()?>"></script>
<script type="text/javascript" src="/local/components/sh/user.settings/js/specialism_action.js?<?=time()?>"></script>
<script type="text/javascript" src="/local/components/sh/user.settings/js/validate_fields.js?<?=time()?>"></script>
<script>
	<?if($_GET["required_fields"] == "Y") {?>
		is_click_validate_fields('Y');
	<?}?>
</script>