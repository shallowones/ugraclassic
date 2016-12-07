<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<form action="<?=POST_FORM_ACTION_URI?>" method="POST" enctype="multipart/form-data" class="feedback-form">
    <div class="feedback-desc">
        Данный сервис предназначен для обратной связи с КТЦ «Югра-Классик». Воспользуйтесь формой,
        чтобы задать интересующий Вас вопрос, отправить комментарии, замечания или предложения.
    </div>
    <?if(!empty($arResult["ERROR_MESSAGE"]))
    {
        ?><div class="feedback-mess error"><?
        foreach($arResult["ERROR_MESSAGE"] as $v)
            echo $v . '<br>';
        ?></div><?
    }
    if(strlen($arResult["OK_MESSAGE"]) > 0)
    {
        ?><div class="feedback-mess ok"><?=$arResult["OK_MESSAGE"]?></div><?
    }
    ?>
    <?=bitrix_sessid_post()?>
    <div class="f-line">
        <div class="f-row">
            <label for="fio">ФИО <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><span class="req">*</span><?endif?></label>
            <input type="text" id="fio" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>">
        </div>
        <div class="f-row">
            <label for="email">E-mail <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?><span class="req">*</span><?endif?></label>
            <input type="email" id="email" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>" <? if($arResult["ERROR_MESSAGE"]['EMAIL']): ?>class="err"<? endif; ?>>
        </div>
    </div>
    <div class="s-line">
        <label for="message">Текст сообщения <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?><span class="req">*</span><?endif?></label>
        <textarea id="message" name="MESSAGE" <? if($arResult["ERROR_MESSAGE"]['MESSAGE']): ?>class="err"<? endif; ?>><?=$arResult["MESSAGE"]?></textarea>
    </div>

    <div class="t-line">
        <?if($arParams["USE_CAPTCHA"] == "Y"):?>
            <div class="cap-block">
                <div class="feedback-captcha">
                    <input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
                    <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
                </div>
                <div class="feedback-cod">
                    <label for="cod">Код с картинки <span class="req">*</span></label>
                    <input type="text" name="captcha_word" size="30" maxlength="50" value="" <? if($arResult["ERROR_MESSAGE"]['CAPTCHA']): ?>class="err"<? endif; ?>>
                </div>
            </div>
        <?endif;?>
        <div class="feedback-button">
            <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
            <input type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
        </div>

    </div>
</form>
