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
    <br clear="all">
    <br clear="all">
    <br clear="all">
    <br clear="all">
    <br clear="all">


    <ul id="top-menu">

        <div class="search-menu">
            <div id="title-search" class="bx-searchtitle">
                <form action="/search/index.php">
                    <div class="bx-input-group">
                        <input id="title-search-input" type="text" name="q" value="" autocomplete="off"
                               class="bx-form-control" placeholder="ПОИСК">
                        <span class="bx-input-group-btn">
				<button class="btn btn-default" type="submit" name="s"><i class="fa fa-search"></i></button>
			</span>
                    </div>
                </form>
            </div>
            <script>
                BX.ready(function () {
                    new JCTitleSearch({
                        'AJAX_PAGE': '/local/html/photo-filter.php',
                        'CONTAINER_ID': 'title-search',
                        'INPUT_ID': 'title-search-input',
                        'MIN_QUERY_LEN': 2
                    });
                });
            </script>

        </div><!-- .search-head -->

        <li><a href="/about/" class="root-item">О КТЦ</a>
            <ul class="falls">
                <li><a href="/about/">Общие сведения</a></li>
                <li><a href="/about/history/">История</a></li>
                <li><a href="/about/structure/">Структура</a></li>
                <li><a href="/about/activities/">Направления деятельности</a></li>
                <li><a href="/about/docs/">Документы</a></li>
                <li><a href="/about/management/">Дирекция</a></li>
                <li><a href="/about/halls/">Концертные залы</a></li>
                <li><a href="/about/soloists/">Солисты</a></li>
                <li><a href="/about/jobs/">Вакансии</a></li>
                <li><a href="/about/services/">Услуги</a></li>
            </ul>
        </li>
        <li><a href="/events/" class="root-item">Афиша</a>
            <ul class="falls">
                <li><a href="/events/index.php">Афиша</a></li>
                <li><a href="/events/official_events/">Спецпроекты</a></li>
                <li><a href="/events/region-event/">Гастрольная карта</a></li>
                <li><a href="/events/online/">Online-трансляции</a></li>
            </ul>
        </li>
        <li><a href="/mediacenter/" class="root-item">Медиацентр</a>
            <ul class="falls">
                <li><a href="/mediacenter/Accreditation/">Аккредитация для СМИ</a></li>
                <li><a href="/mediacenter/ruleaccreditation/">Правила для аккредитованных СМИ</a></li>
                <li><a href="/mediacenter/team/">Наша команда</a></li>
            </ul>
        </li>
        <li><a href="/season-tickets/" class="root-item">Абонементы сезона</a></li>
        <li class="t-more"></li>
    </ul>
    <nav class="clearfix">
        <a href="#" id="pull"></a>


        <div class="menu-clear-left"></div>

    </nav>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>