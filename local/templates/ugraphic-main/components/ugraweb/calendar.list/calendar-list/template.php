<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
//echo "<pre>"; print_r($arResult); echo "</pre>";
?>
<?
use Bitrix\Main\Page\Asset;
$asset = Asset::getInstance();
//$asset->addJs(SITE_TEMPLATE_PATH . '/js/swiper/js/swiper.jquery.min.js');
//$asset->addCss(SITE_TEMPLATE_PATH . '/js/swiper/css/swiper.min.css');
$asset->addCss(SITE_TEMPLATE_PATH . '/css/events-calendar.css');
?>
<div class="calendar-line">
    <div class="wrapper">
        <h1>КАЛЕНДАРЬ СОБЫТИЙ</h1>
<div class="events">
    <div class="swiper-container events-container">
        <div class="swiper-wrapper events-wrapper">
            <? foreach($arResult["Days"] as $key => $arDay): ?>
            <?$count++;?>
                <? if(intval($arDay['day']) == 1): ?>
                    <div class="swiper-slide events-slide">
                        <div class="events-item events-item_month"><?=FormatDate("f",MakeTimeStamp($arDay['date']))?></div>
                    </div>
                <? endif; ?>
                <div class="swiper-slide events-slide">
                    <?
                    $bE = isset($arDay["events"]);
                    if($bE)
                    {
                        $event = [];
                        foreach($arDay["events"] as $k => $arEvent)
                        {
                            $event[] = [

                                'time' => $arEvent['date_event_format'],
                                'title' => $arEvent['name'],
                                'link' => $arEvent['url'],
                                'img' => $arEvent['picture']['src_small']
                            ];
                        }
                    }
                    ?>
                    <div class="events-item events-item_day <?if($bE) echo 'events-item_day_event';?>" <? if($bE): ?>data-events="<?= htmlspecialchars(json_encode($event)); ?>"<? endif; ?>><b><?=$arDay['day']?></b> <?=$arDay['day_name']?></div>
                </div>
            <? endforeach; ?>
        </div>
    </div>

    <div class="swiper-button-prev events-button events-button_prev"></div>
    <div class="swiper-button-next events-button events-button_next"></div>
</div>
    </div><!-- .wrapper -->
</div><!-- .calendar line -->
