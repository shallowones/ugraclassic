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

	<?if($_SESSION["SEND_NOTIFICATIONS_OK"]):?>
		<p style="color:green">Изменения успешно сохранены</p>
		<?$_SESSION["SEND_NOTIFICATIONS_OK"] = false;?>
	<?endif;?>

	<form action="<?=$APPLICATION->GetCurDir();?>" method="POST">
		<div class="form-line form-line_w_fluid">
			<div class="form-line__cel form-line__cel_lt_left">
				<label for="ep-email" class="form-label">Отправлять мне письма</label>
			</div>
			<div class="form-line__cel form-line__cel_lt_right">
				<ul class="form-el-list">
					<li class="form-el-list__i">
						<label class="checkbox js-checkbox" for="new_pers_msg"><input type="checkbox" id="new_pers_msg" name="new_pers_msg" value="Y" <?if($arResult["USER_FIELDS"]["UF_NEW_PERS_MSG"] == "Y"):?>checked=""<?endif;?>>О новых личных сообщениях</label>
					</li>
					<li class="form-el-list__i">
						<label class="checkbox js-checkbox" for="com_for_posts"><input type="checkbox" id="com_for_posts" name="com_for_posts" value="Y" <?if($arResult["USER_FIELDS"]["UF_COM_FOR_POSTS"] == "Y"):?>checked=""<?endif;?>>О комментариях к моим материалам</label>
					</li>
					<li class="form-el-list__i">
						<label class="checkbox js-checkbox" for="answer_for_com"><input type="checkbox" id="answer_for_com" name="answer_for_com" value="Y" <?if($arResult["USER_FIELDS"]["UF_ANSWER_FOR_COM"] == "Y"):?>checked=""<?endif;?>>О новых ответах на мои комментарии</label>
					</li>
					<li class="form-el-list__i">
						<label class="checkbox js-checkbox" for="new_subscribes"><input type="checkbox" id="new_subscribes" name="new_subscribes" value="Y" <?if($arResult["USER_FIELDS"]["UF_NEW_SUBSCRIBES"] == "Y"):?>checked=""<?endif;?>>О новых подписчиках</label>
					</li>
					<li class="form-el-list__i">
						<label class="checkbox js-checkbox" for="reminder_events"><input type="checkbox" id="reminder_events" name="reminder_events" value="Y" <?if($arResult["USER_FIELDS"]["UF_REMINDER_EVENTS"] == "Y"):?>checked=""<?endif;?>>Напоминания о событиях на которые иду</label>
					</li>
				</ul>
			</div><!-- form-line__cel -->
		</div><!-- form-line -->
						
		<div class="form-line form-line_w_fluid">
			<div class="form-line__cel form-line__cel_lt_left">
				<label for="ep-email" class="form-label">Рассылки</label>
			</div>
			<div class="form-line__cel form-line__cel_lt_right">
				<ul class="form-el-list">
					<li class="form-el-list__i">
						<label class="checkbox js-checkbox" for="not_mail_news_sh"><input type="checkbox" id="not_mail_news_sh" name="not_mail_news_sh" value="Y" <?if($arResult["USER_FIELDS"]["UF_NOT_MAIL_NEWS_SH"] == "Y"):?>checked=""<?endif;?>>Я не хочу получать рассылку о новостях сообщества «Школлеги»</label>
					</li>
				</ul>
			</div><!-- form-line__cel -->
		</div><!-- form-line -->
		
		<div class="separator separator_space_more"></div>
		
		<input type="submit" value="Сохранить" class="button" name="send_notifications">
						
	</form>

</div><!-- form -->