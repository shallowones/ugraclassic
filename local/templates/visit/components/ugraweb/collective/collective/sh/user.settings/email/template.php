<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
?>

<div class="form form_space_bot form_space_top">
	<?if($_SESSION["EDIT_EMAIL_OK"]):?>
		<?$_SESSION["EDIT_EMAIL_OK"] = false;?>
		<br /><br />
		<span style="color:green;"><b>Электронная почта успешно изменена.</b></span><br />
		<br /><br />
	<?else:?>


	<?if(!empty($arResult["form_email"])):?>
		<?ShowError($arResult["strProfileError"]);?>
	<?endif;?>

	<?
	if ($arResult['DATA_SAVED'] == 'Y' && !empty($arResult["form_email"]))
		ShowNote(GetMessage('PROFILE_DATA_SAVED'));
	?>

	<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
	<?=$arResult["BX_SESSION_CHECK"]?>
	<input type="hidden" name="settings_type" value="info" />
	<input type="hidden" name="lang" value="<?=LANG?>" />
	<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
	<input type="hidden" name="form_email" value="Y" />

		
		<h2 class="form-h form-h_stl_bordered">Электронная почта</h2>
		
		<div class="form-line form-line_w_fluid">
			<div class="form-line__cel form-line__cel_lt_left">
				<label for="ep-email" class="form-label">Адрес электронной почты</label>
			</div>
			<div class="form-line__cel form-line__cel_lt_right">
				<div class="error error_w_fluid">
					<input type="text" name="EMAIL" id="ep-email" value="<?echo $arResult["arUser"]["EMAIL"]?>" class="form-input form-input_w_fluid">
					<div class="error__popup">
						<div class="error__h font-2">Внимание!</div>
						
						После изменения адреса электронной почты необходимо завершить процедуру проверки. Сообщение будет отправлено по новому адресу. До завершения процедуры проверки используйте для входа действующий адрес электронной почты.
					</div>
				</div><!-- error -->
			</div><!-- form-line__cel -->
		</div><!-- form-line -->
		
		<div class="separator separator_space_more"></div>
		
		<input type="submit" value="Изменить" class="button" name="save_email">
		
	</form>
	<?endif;?>
</div><!-- form -->