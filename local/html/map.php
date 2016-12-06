<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Гастрольня карта");
?>

    <form method="get" enctype="multipart/form-data" class="tours">
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
            <div class="rset"><a href="javascript:void(0)">Сбросить</a></div>
            <input type="submit" value="Применить">
        </div>
    </form>

    <div class="ev-map">
        <img src="<? echo SITE_TEMPLATE_PATH . '/img/Yugra_Subdivisions.png' ?>">
    </div>

    <div class="timetable-block">
        <h2 class="h2">Расписание</h2>
        <div class="label-name">Сортировать:</div>
        <ul class="categories">
            <li class="categories__item">
                По коллективам
                <input type="hidden" value="" name="CATEGORIES[]" title="">
            </li>
            <li class="categories__item cat-active">
                По дате
                <input type="hidden" value="" name="CATEGORIES[]" title="">
            </li>
        </ul>
        <ul class="timetable">
            <li class="timetable__item">
                <a href="#">
                    <div class="t-img">
                        <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/27.png' ?>">
                    </div>
                    <div class="executor">Симфонический оркестр</div>
                    <div class="t-name">Органная фантазия</div>
                    <div class="t-desc">
                        <div class="d-place">12 сентября, органный зал</div>
                        <div class="age">12+</div>
                    </div>
                </a>
            </li>
            <li class="timetable__item">
                <a href="#">
                    <div class="t-img">
                        <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/28.png' ?>">
                    </div>
                    <div class="executor">Сибирь-брасс</div>
                    <div class="t-name">Времена года</div>
                    <div class="t-desc">
                        <div class="d-place">15 сентября, органный зал</div>
                        <div class="age">12+</div>
                    </div>
                </a>
            </li>
            <li class="timetable__item">
                <a href="#">
                    <div class="t-img">
                        <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/27.png' ?>">
                    </div>
                    <div class="executor">Симфонический оркестр</div>
                    <div class="t-name">Органная фантазия</div>
                    <div class="t-desc">
                        <div class="d-place">12 сентября, органный зал</div>
                        <div class="age">12+</div>
                    </div>
                </a>
            </li>
            <li class="timetable__item">
                <a href="#">
                    <div class="t-img">
                        <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/28.png' ?>">
                    </div>
                    <div class="executor">Сибирь-брасс</div>
                    <div class="t-name">Времена года</div>
                    <div class="t-desc">
                        <div class="d-place">15 сентября, органный зал</div>
                        <div class="age">12+</div>
                    </div>
                </a>
            </li>
        </ul>
    </div>

    <div class="timetable-block">
        <h2 class="h2">Расписание</h2>
        <div class="label-name">Сортировать:</div>
        <ul class="categories">
            <li class="categories__item cat-active">
                По коллективам
                <input type="hidden" value="" name="CATEGORIES[]" title="">
            </li>
            <li class="categories__item">
                По дате
                <input type="hidden" value="" name="CATEGORIES[]" title="">
            </li>
        </ul>
        <div class="label-group">Симфонический оркестр</div>
        <ul class="timetable">
            <li class="timetable__item">
                <a href="#">
                    <div class="t-img">
                        <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/27.png' ?>">
                    </div>
                    <div class="executor">Симфонический оркестр</div>
                    <div class="t-name">Органная фантазия</div>
                    <div class="t-desc">
                        <div class="d-place">12 сентября, органный зал</div>
                        <div class="age">12+</div>
                    </div>
                </a>
            </li>
            <li class="timetable__item">
                <a href="#">
                    <div class="t-img">
                        <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/28.png' ?>">
                    </div>
                    <div class="executor">Сибирь-брасс</div>
                    <div class="t-name">Времена года</div>
                    <div class="t-desc">
                        <div class="d-place">15 сентября, органный зал</div>
                        <div class="age">12+</div>
                    </div>
                </a>
            </li>
            <li class="timetable__item">
                <a href="#">
                    <div class="t-img">
                        <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/27.png' ?>">
                    </div>
                    <div class="executor">Симфонический оркестр</div>
                    <div class="t-name">Органная фантазия</div>
                    <div class="t-desc">
                        <div class="d-place">12 сентября, органный зал</div>
                        <div class="age">12+</div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="more-block">
            <a href="#">Показать еще</a>
        </div>

        <div class="label-group">Сибирь-брасс</div>
        <ul class="timetable">
            <li class="timetable__item">
                <a href="#">
                    <div class="t-img">
                        <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/27.png' ?>">
                    </div>
                    <div class="executor">Симфонический оркестр</div>
                    <div class="t-name">Органная фантазия</div>
                    <div class="t-desc">
                        <div class="d-place">12 сентября, органный зал</div>
                        <div class="age">12+</div>
                    </div>
                </a>
            </li>
            <li class="timetable__item">
                <a href="#">
                    <div class="t-img">
                        <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/28.png' ?>">
                    </div>
                    <div class="executor">Сибирь-брасс</div>
                    <div class="t-name">Времена года</div>
                    <div class="t-desc">
                        <div class="d-place">15 сентября, органный зал</div>
                        <div class="age">12+</div>
                    </div>
                </a>
            </li>
            <li class="timetable__item">
                <a href="#">
                    <div class="t-img">
                        <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/27.png' ?>">
                    </div>
                    <div class="executor">Симфонический оркестр</div>
                    <div class="t-name">Органная фантазия</div>
                    <div class="t-desc">
                        <div class="d-place">12 сентября, органный зал</div>
                        <div class="age">12+</div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="more-block">
            <a href="#">Показать еще</a>
        </div>
    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>