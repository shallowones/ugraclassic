<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Обратная связь");
use Bitrix\Main\Page\Asset;

Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/js/swiper/css/swiper.min.css");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/swiper/js/swiper.jquery.min.js");
?>

    <div class="promo-block wrapper">
        <div class="promo-container">
            <div class="promo-first">
                <a href="#">
                    <div class="promo__item">
                        <div class="promo-img">
                            <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/0.jpg' ?>">
                        </div>
                        <div class="promo-wrap"></div>
                        <div class="promo-desc">
                            <div class="promo-date">24 декабря, 20:00</div>
                            <div class="promo-name">Балет Игоря Моисеева</div>
                        </div>
                        <div class="age">6+</div>
                    </div>
                </a>
            </div>
            <div class="promo-second">
                <div class="promo-second-line">
                    <a href="#">
                        <div class="promo__item">
                            <div class="promo-img">
                                <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/00.jpg' ?>">
                            </div>
                            <div class="promo-wrap"></div>
                            <div class="promo-desc">
                                <div class="promo-date">24 декабря, 20:00</div>
                                <div class="promo-name">Балет Игоря Моисеева</div>
                            </div>
                            <div class="age">6+</div>
                        </div>
                    </a>
                </div>
                <div class="promo-second-line">
                    <a href="#">
                        <div class="promo__item">
                            <div class="promo-img">
                                <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/000.jpg' ?>">
                            </div>
                            <div class="promo-wrap"></div>
                            <div class="promo-desc">
                                <div class="promo-date">24 декабря, 20:00</div>
                                <div class="promo-name">Балет Игоря Моисеева</div>
                            </div>
                            <div class="age">6+</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="swiper-container"> <!-- hide -->
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#">
                        <div class="promo__item">
                            <div class="promo-img">
                                <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/0.jpg' ?>">
                            </div>
                            <div class="promo-wrap"></div>
                            <div class="promo-desc">
                                <div class="promo-date">24 декабря, 20:00</div>
                                <div class="promo-name">Балет Игоря Моисеева</div>
                            </div>
                            <div class="age">6+</div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#">
                        <div class="promo__item">
                            <div class="promo-img">
                                <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/00.jpg' ?>">
                            </div>
                            <div class="promo-wrap"></div>
                            <div class="promo-desc">
                                <div class="promo-date">24 декабря, 20:00</div>
                                <div class="promo-name">Балет Игоря Моисеева</div>
                            </div>
                            <div class="age">6+</div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#">
                        <div class="promo__item">
                            <div class="promo-img">
                                <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/000.jpg' ?>">
                            </div>
                            <div class="promo-wrap"></div>
                            <div class="promo-desc">
                                <div class="promo-date">24 декабря, 20:00</div>
                                <div class="promo-name">Балет Игоря Моисеева</div>
                            </div>
                            <div class="age">6+</div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>