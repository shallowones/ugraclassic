<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Обратная связь");
?>

    <form method="get" action="#" enctype="multipart/form-data" class="feedback-form">
        <div class="feedback-desc">
            Данный сервис предназначен для обратной связи с КТЦ «Югра-Классик». Воспользуйтесь формой,
            чтобы задать интересующий Вас вопрос, отправить комментарии, замечания или предложения.
        </div>
        <div class="feedback-mess ok">
            Ваше сообщение отправлено!
        </div>
        <div class="feedback-mess error">
            Неверно указан E-mail!
        </div>
        <div class="f-line">
            <div class="f-row">
                <label for="fio">ФИО</label>
                <input type="text" id="fio" name="fio" value="Какашкин Константин Константинопольский">
            </div>
            <div class="f-row">
                <label for="email">E-mail <span class="req">*</span></label>
                <input type="email" id="email" name="email" class="err">
            </div>
        </div>
        <div class="s-line">
            <label for="message">Текст сообщения <span class="req">*</span></label>
            <textarea id="message" name="message" class="err">Очень классный сайт, особенно дизайн Данный сервис предназначен для обратной связи с КТЦ«Югра-Классик».Воспользуйтесь формой, чтобы задать интересующий Вас вопрос, отправить комментарии, замечания или предложения чтобы задать интересующий Вас вопрос. фывфывфывфывфывфывфывфыв</textarea>
        </div>
        <div class="t-line">
            <div class="cap-block">
                <div class="feedback-captcha">
                    <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/captcha.png' ?>">
                </div>
                <div class="feedback-cod">
                    <label for="cod">Код с картинки <span class="req">*</span></label>
                    <input type="text" id="cod" name="cod">
                </div>
            </div>
            <div class="feedback-button">
                <input type="submit" name="set_filter" value="Отправить">
            </div>
        </div>
    </form>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>