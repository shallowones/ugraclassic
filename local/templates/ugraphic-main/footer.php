<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
		<?if ($APPLICATION->GetCurPage() != "/index.php"):?>
			<?if ($APPLICATION->GetDirProperty("SHOW_RIGHT_COL") == "Y"):?>
						</div><!-- col-left-cont -->
						<div class="col-right-cont">
							<?$APPLICATION->IncludeComponent("bitrix:menu", "sidebar-menu", Array(
	"ROOT_MENU_TYPE" => "left",	// Тип меню для первого уровня
		"MAX_LEVEL" => "1",	// Уровень вложенности меню
		"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
		"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"MENU_CACHE_TYPE" => "A",	// Тип кеширования
		"MENU_CACHE_TIME" => "36000",	// Время кеширования (сек.)
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
		"MENU_THEME" => "green",	// Тема меню
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

			<?$APPLICATION->IncludeComponent("bitrix:menu", "foter-menu", Array(
				"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
					"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
					"DELAY" => "N",	// Откладывать выполнение шаблона меню
					"MAX_LEVEL" => "2",	// Уровень вложенности меню
					"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
					"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
					"MENU_CACHE_TYPE" => "N",	// Тип кеширования
					"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
					"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
					"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
					"COMPONENT_TEMPLATE" => "tree"
				),
				false
			);?>

			<div class="copyright">
				© 2016 Концертно-театральный комплекс 
				<br/>«Югра-Классик»
				<br/>Все права защищены
			</div>

		</div><!-- .wrapper -->
	</div><!-- #footer -->

	</body>
</html>