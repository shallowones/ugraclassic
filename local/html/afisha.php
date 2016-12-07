<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Обратная связь");
?>

    <form name="arrFilter_form" method="get" action="#" enctype="multipart/form-data" class="filter-form">
        <div class="second-line">
            <div class="label-name">Дата:</div>
            <ul class="dates">
                <li class="dates__item">
                    <input type="text" value="" name="date_start" id="date_start" title="">
                </li>
                <li class="dates__item">
                    <input type="text" value="" name="date_end" id="date_end" title="">
                </li>
            </ul>
            <ul class="categories" id="days">
                <li class="categories__item" value="today">
                    Сегодня
                </li>
                <li class="categories__item" value="tomorrow">
                    Завтра
                </li>
                <li class="categories__item" value="week">
                    На этой неделе
                </li>
                <li class="categories__item" value="month">
                    В этом месяце
                </li>
            </ul>
        </div>
        <div class="filter-buttons">
            <div class="confirm">
                <input type="submit" name="set_filter" value="Применить">
            </div>
            <div class="reset"><a href="javascript:void(0)">Сбросить фильтр</a></div>
        </div>
    </form>

    <div class="afisha">
        <div class="afisha__item">
            <a href="#">
                <div class="afisha-img">
                    <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/27.png' ?>">
                </div>
            </a>
            <div class="afisha-info">
                <a href="#">
                    <div class="afisha-desc">
                        <h3>Школа ведущих</h3>
                        <ul class="afisha-w">
                            <li class="afisha-w__item"><span>Дата:</span> каждый вторник и четверг</li>
                            <li class="afisha-w__item"><span>Время:</span> 18:30</li>
                            <li class="afisha-w__item"><span>Место:</span> зал «Трансформер»</li>
                        </ul>
                    </div>
                </a>
                <div class="afisha-ticket">
                    <div class="tick">
                        <div class="tick-1"><span>Цена билета:</span></div>
                        <div class="tick-2">от 1800 до 5500 руб.</div>
                    </div>
                    <div class="tick">
                        <a href="#">Купить билет онлайн</a>
                    </div>
                </div>
                <div class="age">12+</div>
            </div>
        </div>
        <div class="afisha__item">
            <a href="#">
                <div class="afisha-img">
                    <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/28.png' ?>">
                </div>
            </a>
            <div class="afisha-info">
                <a href="#">
                    <div class="afisha-desc">
                        <h3>Школа ведущих</h3>
                        <ul class="afisha-w">
                            <li class="afisha-w__item"><span>Дата:</span> каждый вторник и четверг</li>
                            <li class="afisha-w__item"><span>Время:</span> 18:30</li>
                            <li class="afisha-w__item"><span>Место:</span> зал «Трансформер»</li>
                        </ul>
                    </div>
                </a>
                <div class="afisha-ticket">
                    <div class="tick">
                        <div class="tick-1"><span>Цена билета:</span></div>
                        <div class="tick-2">от 1800 до 5500 руб.</div>
                    </div>
                    <div class="tick">
                        <a href="#">Купить билет онлайн</a>
                    </div>
                </div>
                <div class="age">6+</div>
            </div>
        </div>
        <div class="afisha__item">
            <a href="#">
                <div class="afisha-img">
                    <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/27.png' ?>">
                </div>
            </a>
            <div class="afisha-info">
                <a href="#">
                    <div class="afisha-desc">
                        <h3>Школа ведущих</h3>
                        <ul class="afisha-w">
                            <li class="afisha-w__item"><span>Дата:</span> каждый вторник и четверг</li>
                            <li class="afisha-w__item"><span>Время:</span> 18:30</li>
                            <li class="afisha-w__item"><span>Место:</span> зал «Трансформер»</li>
                        </ul>
                    </div>
                </a>
                <div class="age">12+</div>
            </div>
        </div>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>