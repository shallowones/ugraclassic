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

        <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function() {
                    try {
                        w.yaCounter41824764 = new Ya.Metrika({
                            id:41824764,
                            clickmap:true,
                            trackLinks:true,
                            accurateTrackBounce:true
                        });
                    } catch(e) { }
                });
                var n = d.getElementsByTagName("script")[0],
                    s = d.createElement("script"),
                    f = function () { n.parentNode.insertBefore(s, n); };
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://mc.yandex.ru/metrika/watch.js";
                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else { f(); }
            })(document, window, "yandex_metrika_callbacks");
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/41824764" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->

    </body>
</html>