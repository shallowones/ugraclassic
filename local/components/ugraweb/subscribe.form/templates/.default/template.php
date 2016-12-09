<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?// form?>

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


	<?// Вывод ошибок, если есть
	if (count($arResult["Error"]) > 0): ?>
		<p style="color: red;"><? echo implode("<br />", $arResult["Error"]); ?></p>
	<? endif; ?>

	<?// Вывод формы для подписки?>
	<form action="<?=POST_FORM_ACTION_URI?>" method="post">
		E-MAIL:<br />
		<input type="text" size="30" name="subscribe-email" value="<?=$arResult["subscribe-email"]?>"><br />
        <br />
        <p>РУБРИКИ:</p>
        <? foreach ($arResult["RUBRIC_LIST"] as $arRubric): ?>
            <input
                    type="checkbox"
                    name="subscribe-rubric[]"
                    value="<?=$arRubric['ID']?>"
                    <? if(in_array($arRubric['ID'], $arResult["'subscribe-rubric"])) echo 'checked'; ?>
            > <?=$arRubric['NAME']?><br />
        <? endforeach; ?>
		<input style="margin-top:10px;" type="submit" name="submit" value="Подписаться">
	</form>
	
<?endif?>