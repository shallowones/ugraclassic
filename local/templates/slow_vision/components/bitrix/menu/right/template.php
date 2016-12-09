<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <? foreach($arResult as $arItem): ?>
        <?if ((!strpos($arItem['LINK'], 'online'))
            &&(!strpos($arItem['LINK'], 'photo'))
            &&(!strpos($arItem['LINK'], 'structure'))
            &&(!strpos($arItem['LINK'], 'halls'))){?>
        <? if($arItem["DEPTH_LEVEL"] > 1) continue; ?><a href="<?=$arItem["LINK"]?>" class="menu__link <? if($arItem["SELECTED"] && !$arParams['IS_SID']) echo 'menu__link_active'; ?>"><?=$arItem["TEXT"]?></a>
            <?}?>
            <?endforeach?>
<?endif?>


                              
