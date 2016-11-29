<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
?>

<div class="form form_space_bot">
	<?if(!empty($arResult["form_password"])):?>
		<?ShowError($arResult["strProfileError"]);?>
	<?endif;?>

	<?
	if ($arResult['DATA_SAVED'] == 'Y' && !empty($arResult["form_password"]))
		ShowNote(GetMessage('PROFILE_DATA_SAVED'));
	?>

	<form method="post" name="form2" id="form2" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
		<?=$arResult["BX_SESSION_CHECK"]?>
		<input type="hidden" name="settings_type" value="info" />
		<input type="hidden" name="lang" value="<?=LANG?>" />
		<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
		<input type="hidden" name="form_password" value="Y" />

		<h2 class="form-h form-h_stl_bordered">Сменить пароль</h2>
		
		<div class="form-line form-line_w_fluid">
			<div class="form-line__cel form-line__cel_lt_left">
				<label for="ep-pass_old" class="form-label">Старый пароль</label>
			</div>
			<div class="form-line__cel form-line__cel_lt_right">
				<input type="password" name="OLD_PASSWORD" id="ep-pass_old" value="" autocomplete="off" class="form-input form-input_w_fluid">
			</div>
		</div><!-- form-line -->
		
		<div class="form-line form-line_w_fluid">
			<div class="form-line__cel form-line__cel_lt_left">
				<label for="ep-pass_new" class="form-label">Новый пароль</label>
			</div>
			<div class="form-line__cel form-line__cel_lt_right">
				<input type="password" name="NEW_PASSWORD" id="ep-pass_new" value="" autocomplete="off" class="form-input form-input_w_fluid">
			</div>
		</div><!-- form-line -->
		
		<div class="form-line form-line_w_fluid">
			<div class="form-line__cel form-line__cel_lt_left">
				<label for="ep-pass_new2" class="form-label">Новый пароль (повторно)</label>
			</div>
			<div class="form-line__cel form-line__cel_lt_right">
				<input type="password" name="NEW_PASSWORD_CONFIRM" id="ep-pass_new2" value="" autocomplete="off" class="form-input form-input_w_fluid">
			</div>
		</div><!-- form-line -->
		
		<div class="separator separator_space_more"></div>
		
		<input type="submit" value="Изменить" class="button" name="save">

	</form>
</div><!-- form -->