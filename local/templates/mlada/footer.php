<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
		<?if ($APPLICATION->GetCurPage() != "/collective/mlada/index.php"):?>
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

		Ансамбль русской песни «Млада»

		</div><!-- .wrapper -->
	</div><!-- #footer -->

	</body>
</html>