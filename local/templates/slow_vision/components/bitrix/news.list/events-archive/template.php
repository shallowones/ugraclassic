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
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<?
    $prev_img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>265, 'height'=>160), BX_RESIZE_IMAGE_EXACT, true);
    if(!isset($prev_img["src"]))
    {
        $prev_img["src"] = SITE_TEMPLATE_PATH . '/img/no-photo-afishe.png';
    }
    ?>

    <div class="afisha__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="afisha-info">
            <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
                <div class="afisha-desc">
                    <h3><?echo $arItem["NAME"]?>
                        <?if(isset($arItem["DISPLAY_PROPERTIES"]["age"])):?>
                            <?=$arItem["DISPLAY_PROPERTIES"]["age"]["DISPLAY_VALUE"]?>
                        <?endif;?>
                    </h3>
                        <?if(isset($arItem["ACTIVE_FROM"])):?>
                            <span>Дата:</span>
                                <? if(is_array($arItem["DISPLAY_PROPERTIES"]["date_text"])): ?>
                                    <?=$arItem["DISPLAY_PROPERTIES"]["date_text"]["DISPLAY_VALUE"]?>
                                <? else: ?>
                                    <?
                                    $date = ParseDateTime($arItem["ACTIVE_FROM"], FORMAT_DATETIME);
                                    $date = intval($date["DD"])." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S"));
                                    echo $date;
                                    ?>
                                <? endif; ?>
                            <br>
                            <span>Время:</span> <?echo ConvertDateTime($arItem["ACTIVE_FROM"],"HH:MI");?><br>
                        <?endif;?>
                        <?if(isset($arItem["DISPLAY_PROPERTIES"]["hall"])):?>
                            <span>Место:</span>
                                <? if(is_array($arItem["DISPLAY_PROPERTIES"]["hall"]["DISPLAY_VALUE"])): ?>
                                    <?=implode(', ', $arItem["DISPLAY_PROPERTIES"]["hall"]["DISPLAY_VALUE"])?>
                                <? else: ?>
                                    <?=$arItem["DISPLAY_PROPERTIES"]["hall"]["DISPLAY_VALUE"]?>
                                <br><? endif; ?>
                        <?endif;?>
                </div>
            </a>
            <div class="afisha-ticket">
                <?if(isset($arItem["DISPLAY_PROPERTIES"]["cost"])):?>
                    <div class="tick">
                        <div class="tick-1"><span>Цена билета:</span></div>
                        <div class="tick-2"><?=$arItem["DISPLAY_PROPERTIES"]["cost"]["DISPLAY_VALUE"]?></div>
                    </div>
                <? endif; ?>
                <? if(strlen(trim($arItem['DISPLAY_PROPERTIES']['link_kassir']['VALUE'])) > 0): ?>
                    <div class="tick">
                        <a href="<?=$arItem['DISPLAY_PROPERTIES']['link_kassir']['VALUE']?>">Купить билет онлайн</a>
                    </div>
                <? endif; ?>
            </div>
        </div>
    </div>
<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
