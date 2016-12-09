<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <? foreach($arResult as $k=>$arItem): ?><? if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) continue; ?><a href="<?=$arItem["LINK"]?>" class="menu__link<? if($arItem["SELECTED"]) echo ' menu__link_active'; ?>"><?=$arItem["TEXT"]?></a><? endforeach; ?>
<?endif?>
