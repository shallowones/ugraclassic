<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?// form?>
	<div class="subscription-desc">
		После заполнения формы на указанный Вами адрес электронной почты придет письмо с подтверждением подписки.
	</div>
<?if(
    ($_SESSION['SEND_SUBSCRIBE_CONFIRM'])
):?>
	<p style='color:green;'>
        <?=$_SESSION['SEND_SUBSCRIBE_CONFIRM']?>
    </p>
    <? $_SESSION['SEND_SUBSCRIBE_CONFIRM'] = 0; ?>
<?else:?>

	<?// Вывод сообщение об успешной подписке?>
	<?if($_SESSION['SEND_SUBSCRIBE_OK']):?>
		<p style='color:green;'>На указанный в форме E-MAIL отправлено письмо с ссылкой для подтверждения подписки.</p>
		<?$_SESSION['SEND_SUBSCRIBE_OK'] = 0;?>
	<?endif;?>




	<?// Вывод формы для подписки?>
	<form action="<?=POST_FORM_ACTION_URI?>" method="post" class="subscription-form"><?// Вывод ошибок, если есть
		if (count($arResult["Error"]) > 0): ?>
			<div class="subscription-err"><? echo implode("<br />", $arResult["Error"]); ?></div>
		<? endif; ?>
		<div class="s-col">
			<label for="email">E-mail: <span class="req">*</span></label>
			<input type="text" size="30" <?if(strpos($arResult["Error"][0], 'E-MAIL')){?>class="err"<?}?>name="subscribe-email" value="<?=$arResult["subscribe-email"]?>">
		</div>
		<div class="s-col">
			<label for="rubric">Рубрики: <span class="req">*</span></label>
			<select name="subscribe-rubric[]" id="rubric" multiple>
	<? foreach ($arResult["RUBRIC_LIST"] as $arRubric){ ?>
				<option value="<?=$arRubric['ID']?>" <? if(in_array($arRubric['ID'], $arResult["'subscribe-rubric"])) echo 'selected="selected"'; ?>
						><?=$arRubric['NAME']?></option>
		<?}?>
			</select>
		</div>

<!--		<div class="s-col">-->
<!--			<label for="rubric">Рубрики: <span class="req">*</span></label>-->
<!--        --><?// foreach ($arResult["RUBRIC_LIST"] as $arRubric): ?>
<!--            <input type="checkbox" name="subscribe-rubric[]" value="--><?//=$arRubric['ID']?><!--"-->
<!--				--><?// if(in_array($arRubric['ID'], $arResult["'subscribe-rubric"])) echo 'checked'; ?>
<!--            > --><?//=$arRubric['NAME']?><!--<br />-->
<!--        --><?// endforeach; ?>
<!--			</div>-->
		<div class="filter-buttons">
			<input type="submit" name="submit" value="Подписаться">
		</div>
	</form>
	
<?endif?>