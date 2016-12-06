<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Фотоальбомы");
?>

    <form method="get" action="#" enctype="multipart/form-data" class="filter-form">
        <div class="filter-line">
            <div class="first">
                <label class="label-name" for="filter-event">Название мероприятия:</label>
                <input type="text" name="filter-event" id="filter-event">
            </div>
            <div class="second">
                <ul class="dates">
                    <li class="dates__item">
                        <input type="text" value="04.07.2016" name="DATES[]" title="">
                    </li>
                    <li class="dates__item">
                        <input type="text" value="21.12.2019" name="DATES[]" title="">
                    </li>
                </ul>
            </div>
            <div class="third">
                <label class="label-name" for="filter-year">Год:</label>
                <select name="filter-year" id="filter-year">
                    <option value=""></option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                </select>
            </div>
        </div>
        <div class="filter-buttons">
            <div class="confirm">
                <input type="submit" name="set_filter" value="Применить">
            </div>
            <div class="reset">
                <a href="javascript:void(0)">Сбросить фильтр</a>
            </div>
        </div>
    </form>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>