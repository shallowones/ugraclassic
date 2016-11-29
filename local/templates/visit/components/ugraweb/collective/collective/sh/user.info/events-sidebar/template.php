<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
?>

<?if(count($arResult["USER_FIELDS"]) > 0):?>

<div class="sidebar-block">
	<h2 class="sidebar-h sidebar-h_stl_bot-space">Отображать события</h2>
	
	<div class="events-filter">
		<?if($_GET["f"] == "f"):?>
			<div class="events-filter__i events-filter__i_stt_cur">Ближайшие события</div>
		<?else:?>
			<a href="<?=$APPLICATION->GetCurDir()?>?f=f" class="events-filter__i">Ближайшие события</a>
		<?endif;?>
		<?if($_GET["f"] == "p"):?>
			<div class="events-filter__i events-filter__i_stt_cur">Прошедшие события</div>
		<?else:?>
			<a href="<?=$APPLICATION->GetCurDir()?>?f=p" class="events-filter__i">Прошедшие события</a>
		<?endif;?>
	</div><!-- events-filter -->
	
</div><!-- sidebar-block -->

<?endif;?>