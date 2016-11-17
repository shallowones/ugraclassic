<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?
class DateTimeRusDays extends DateTime {
    public function format($format) {
        $replaces = array(
            'Mon' => 'Пн', 
            'Tue' => 'Вт', 
            'Wed' => 'Ср', 
            'Thu' => 'Чт', 
            'Fri' => 'Пт', 
            'Sat' => 'Сб', 
            'Sun' => 'Вс',
            'Jan' => 'Январь',
			'Feb' => 'Февраль',
			'Mar' => 'Март',
			'Apr' => 'Апрель',
			'May' => 'Май',
			'Jun' => 'Июнь',
			'Jul' => 'Июль',
			'Aug' => 'Август',
			'Sep' => 'Сентябрь',
			'Oct' => 'Октябрь',
			'Nov' => 'Ноябрь',
			'Dec' => 'Декабрь'
        );
        return strtr(parent::format($format), $replaces);
    }
}

// Календарь всегда строится с текущей даты по дату последнего мероприятия. Вычисляем количество дней между датами, формируем массив.
$dateFrom = new DateTimeRusDays(); 
$dateTo   = new DateTimeRusDays($arResult["ITEMS"][count($arResult["ITEMS"])-1]["DISPLAY_PROPERTIES"]["date"]["~VALUE"]);

$period = new DatePeriod($dateFrom, new DateInterval('P1D'), $dateTo);

$arrayOfDates = array_map(
    function($item){    	
    	return array(
		    			"DATE" => $item->format("d"), 
		    			"DAY" => $item->format("D"), 
		    			"MONTH" => $item->format("M")
    				);
    },
    iterator_to_array($period)
);
?>

<div class="calendar-slider">
	<div id="owl-calendar-slider" class="owl-carousel owl-theme">
		<?$lastMonth = ''?>
		<?foreach($arrayOfDates as $arDateItem):?>
			<?if ($arDateItem['MONTH'] != $lastMonth):?>
				<?$lastMonth = $arDateItem['MONTH'];?>
				<div class="columns">
					<div class="item">
						<div class="events-month">
							<?=$arDateItem['MONTH']?>
						</div>
					</div>
				</div>
			<?else:?>
				<div class="columns">
					<div class="item">
						<div class="events-day">
							<?=$arDateItem['DATE']?>
							<?=$arDateItem['DAY']?>
						</div>
					</div>
				</div>
			<?endif?>
		<?endforeach;?>
	</div>
</div>





		
		<?foreach($arResult["ITEMS"] as $arItem):?>					
						<?if(is_array($arItem["DISPLAY_PROPERTIES"]["date"])):?>
							<div class="events-slider-date">
							<?=$arItem["DISPLAY_PROPERTIES"]["date"]["DISPLAY_VALUE"]?>
								<?
								$date = ParseDateTime($arItem["DISPLAY_PROPERTIES"]["date"]["DISPLAY_VALUE"], FORMAT_DATETIME);
								$date = $date["DD"]." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S"));
								echo $date;
							?>
							</div>
						<?endif;?>

						<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
							
							<div class="events-name">
								<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
									<?echo $arItem["NAME"]?>
								</a>
							</div>
						<?endif;?>

						<?if(is_array($arItem["DISPLAY_PROPERTIES"]["hall"])):?>
							<div class="events-hall">
								<?=$arItem["DISPLAY_PROPERTIES"]["hall"]["DISPLAY_VALUE"]?>
							</div>
						<?endif;?>


						<?if(is_array($arItem["DISPLAY_PROPERTIES"]["age"])):?>
							<div class="events-age">
								<?=$arItem["DISPLAY_PROPERTIES"]["age"]["DISPLAY_VALUE"]?>
							</div>
						<?endif;?>

						<div class="buy-ticket">Купить билет</div>
		<?endforeach;?>

		

<script>
	var owl = $('#owl-calendar-slider');
		owl.owlCarousel({
			loop : false,
			dots : false,
			margin : 5,
			merge:true,
			autoWidth:true,
			nav : true,
			autoplay : false, 
			autoplayTimeout : 15000, 
			autoplayHoverPause : true,
			smartSpeed : 500,
			navText : ["<i></i>","<i></i>"],
		});
</script>
