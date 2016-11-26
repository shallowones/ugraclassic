<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>

    <div class="header-ktc">
        <div class="line"></div>
        <div class="name">Концертно-театральный центр «Югра-Классик»</div>
        <div class="line"></div>
    </div>

    <div class="contacts">
        <div class="cont-row-one">
            <div class="desc">Телефоны</div>
            <ul class="cont">
                <li class="cont__item">Приемная: <span>352-550</span></li>
                <li class="cont__item">Медиацентр: <span>352-701, 352-702</span></li>
                <li class="cont__item">Касса: <span>352-535</span></li>
                <li class="cont__item">Маркетинг: <span>352-635</span></li>
            </ul>
        </div>
        <div class="cont-row-two">
            <div class="desc">E-mail</div>
            <ul class="cont">
                <li class="cont__item"><a href="mailto:okrart@mail.ru">okrart@mail.ru</a></li>
                <li class="cont__item"><a href="mailto:ugramedia86@gmail.com">ugramedia86@gmail.com</a></li>
            </ul>
        </div>
    </div>
    <div class="contacts">
        <div class="cont-row-one">
            <div class="desc">Адрес</div>
            <ul class="cont">
                <li class="cont__item">г. Ханты-Мансийск, ул. Мира 22</li>
            </ul>
        </div>
        <div class="cont-row-two">
            <div class="desc">Мы в соцсетях</div>
            <ul class="cont">
                <li class="cont__item soc">
                    <a href="#"><div class="vk"></div></a>
                </li>
                <li class="cont__item  soc">
                    <a href="#"><div class="instagram"></div></a>
                </li>
            </ul>
        </div>
    </div>

<div class="map">
    <img src="<? echo SITE_TEMPLATE_PATH . '/img/map.jpg' ?>">
</div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>