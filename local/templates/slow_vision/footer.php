                </article><!--<article class="article"> -->
            </div> <!-- <div class="wrapper"> -->
        </section> <!-- <section class="main"> -->
        <footer class="footer">
            <section class="wrapper">
                <nav class="menu menu_footer">
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "top", array(
                        "ROOT_MENU_TYPE" => "top",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_TIME" => "3600000",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "left",
                        "USE_EXT" => "N",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N"
                    ),
                        false
                    );?>
                </nav>
                <div class="footer__text">
                    © 2016 Концертно-театральный комплекс «Югра-Классик»
                    <br />
                    Все права защищены
                </div>
                <address class="footer__text address">
                    Разработка и подержка - <a class="email" href="http://ugraweb.ru" target="_blank" >Югорские Интернет Решения</a>
                </address>
            </section>
        </footer>
        </div> <!-- <div class="page"> -->
    </body>
</html>