<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

    use Bitrix\Main\Page\Asset;
?>
		<?if ($APPLICATION->GetCurPage() != "/collective/kontsertnyy-orkestr-yugry/index.php"):?>
			<?if ($APPLICATION->GetDirProperty("SHOW_RIGHT_COL") == "Y"):?>
						</div><!-- col-left-cont -->
						<div class="col-right-cont">
							<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"catalog_vertical", 
	array(
		"ROOT_MENU_TYPE" => "left",
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "36000",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_THEME" => "green",
		"COMPONENT_TEMPLATE" => "catalog_vertical"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?>
						</div><!-- .col-right-col -->
			<?endif?>
					</div><!-- .content -->
				</div><!-- .row -->
			</div><!-- .main-containe -->
		<?endif?>

	<div id="footer">
		<div class="wrapper">
            <div class="footer-flex">
                <div class="group-name">
                    <?=$colFtrName?>
                </div>
                <div class="footer-counter">
                    <?/*<img src="<? echo SITE_TEMPLATE_PATH . '/styles/solisti-ktc-yugraclassic/img/counter.png' ?>">*/?>
                </div>
                <div class="footer-ugraweb">
                    Разработка и поддержка —
                    <br><a href="http://ugraweb.ru/">Югорские Интернет Решения</a>
                </div>
            </div>


		</div><!-- .wrapper -->
	</div><!-- #footer -->
    <? Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/styles/".$codeSite."/styles.css"); ?>

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