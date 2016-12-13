<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Новости");
?>
    <div class="subscription-desc">
        После заполнения формы на указанный Вами адрес электронной почты придет письмо с подтверждением подписки.
    </div>

    <form method="post" action="#" enctype="multipart/form-data" class="subscription-form">
        <div class="subscription-err">Неверно указан E-mail</div>
        <div class="s-col">
            <label for="email">E-mail: <span class="req">*</span></label>
            <input type="email" id="email" name="email" class="err">
        </div>
        <div class="s-col">
            <label for="rubric">Рубрики: <span class="req">*</span></label>
            <select name="rubric[]" id="rubric" multiple>
                <option value="2">Новости КТЦ</option>
                <option value="73">Новости культуры Югры</option>
            </select>
        </div>
        <div class="filter-buttons">
            <input type="submit" value="Подписаться">
        </div>
    </form>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>