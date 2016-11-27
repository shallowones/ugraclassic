<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
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
				<?$APPLICATION->IncludeFile("/includes/contact_phone.html",[],["MODE"=>"html"]);?>
			</ul>
		</div>
		<div class="cont-row-two">
			<div class="desc">E-mail</div>
			<ul class="cont">
				<?$APPLICATION->IncludeFile("/includes/contact_email.html",[],["MODE"=>"html"]);?>
			</ul>
		</div>
	</div>
	<div class="contacts">
		<div class="cont-row-one">
			<div class="desc">Адрес</div>
			<ul class="cont">
				<li class="cont__item"><?$APPLICATION->IncludeFile("/includes/contact_address.html",[],["MODE"=>"html"]);?></li>
			</ul>
		</div>
		<div class="cont-row-two">
			<div class="desc">Мы в соцсетях</div>
			<ul class="cont">
				<?$APPLICATION->IncludeFile("/includes/contact_soc.html",[],["MODE"=>"html"]);?>
			</ul>
		</div>
	</div>

	<div class="map">
		<img src="<? echo SITE_TEMPLATE_PATH . '/img/map.jpg' ?>">
	</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>