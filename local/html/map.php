<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>

    <form method="post" action="#" enctype="multipart/form-data" class="tours">
        <div class="tours__item">
            <label for="group">Коллективы</label>
            <select name="group" id="group">
                <option value=""></option>
                <option value="1">Симфонический ансамбль</option>
                <option value="2">Ансамбль Млада</option>
                <option value="3">Сбирь-Барсс</option>
                <option value="4">Ансамбль духовых инструментов</option>
                <option value="5">Театр песни и танца</option>
            </select>
        </div>
        <div class="tours__item">
            <label for="city">Город</label>
            <select name="city" id="city">
                <option value=""></option>
                <option value="1">Ханты-Мансийск</option>
                <option value="2">Югорск</option>
                <option value="3">Пятигорск</option>
                <option value="4">Екатеринбург</option>
                <option value="5">Москва</option>
            </select>
        </div>
        <div class="tours__item">
            <label for="dates">Дата</label>
            <ul class="dates">
                <li class="dates__item">
                    <input type="text" value="04.07.2016" name="date_start" id="date_start" title="">
                </li>
                <li class="dates__item">
                    <input type="text" value="21.12.2019" name="date_end" id="date_end" title="">
                </li>
            </ul>
        </div>
        <div class="filter-buttons">
            <div class="reset"><a href="#">Сбросить фильтр</a></div>
            <input type="button" value="Применить">
        </div>
    </form>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>