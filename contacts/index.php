<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?><div class="header-ktc">
	<div class="line">
	</div>
	<div class="name">
		 Концертно-театральный центр «Югра-Классик»
	</div>
	<div class="line">
	</div>
</div>
<div class="contacts">
	<div class="cont-row-one">
		<div class="desc">
			 Телефоны
		</div>
		<ul class="cont">
			 <?$APPLICATION->IncludeFile("/includes/contact_phone.html",[],["MODE"=>"html"]);?>
		</ul>
	</div>
	<div class="cont-row-two">
		<div class="desc">
			 E-mail
		</div>
		<ul class="cont">
			 <?$APPLICATION->IncludeFile("/includes/contact_email.html",[],["MODE"=>"html"]);?>
		</ul>
	</div>
</div>
<div class="contacts">
	<div class="cont-row-one">
		<div class="desc">
			 Адрес
		</div>
		<ul class="cont">
			<li class="cont__item"><?$APPLICATION->IncludeFile("/includes/contact_address.html",[],["MODE"=>"html"]);?></li>
		</ul>
	</div>
	<div class="cont-row-two">
		<div class="desc">
			 Мы в соцсетях
		</div>
		<ul class="cont">
			 <?$APPLICATION->IncludeFile("/includes/contact_soc.html",[],["MODE"=>"html"]);?>
		</ul>
	</div>
</div>
<div class="map">
<?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	".default", 
	array(
		"CONTROLS" => array(
			0 => "ZOOM",
			1 => "MINIMAP",
			2 => "TYPECONTROL",
			3 => "SCALELINE",
		),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:61.00678734855573;s:10:\"yandex_lon\";d:69.0256610326448;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:69.025382082907;s:3:\"LAT\";d:61.006521710661;s:4:\"TEXT\";s:23:\"улица Мира, 22\";}}}",
		"MAP_HEIGHT" => "350",
		"MAP_ID" => "",
		"MAP_WIDTH" => "1600",
		"OPTIONS" => array(
			0 => "ENABLE_SCROLL_ZOOM",
			1 => "ENABLE_DBLCLICK_ZOOM",
			2 => "ENABLE_DRAGGING",
		),
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>