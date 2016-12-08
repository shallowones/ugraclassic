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
<div class="afisha">
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
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
            <div class="afisha-img">
                <img
                        border="0"
                        src="<?=$prev_img["src"]?>"
                        width="<?=$prev_img["width"]?>"
                        height="<?=$prev_img["height"]?>"
                        alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                        title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                />
            </div>
        </a>
        <div class="afisha-info">
            <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
                <div class="afisha-desc">
                    <h3><?echo $arItem["NAME"]?></h3>
                    <ul class="afisha-w">
                        <?if(isset($arItem["ACTIVE_FROM"])):?>
                            <?
                            $date = ParseDateTime($arItem["ACTIVE_FROM"], FORMAT_DATETIME);
                            $date = $date["DD"]." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S"));
                            ?>
                            <li class="afisha-w__item"><span>Дата:</span> <?echo $date;?></li>
                            <li class="afisha-w__item"><span>Время:</span> <?echo ConvertDateTime($arItem["ACTIVE_FROM"],"HH:MI");?></li>
                        <?endif;?>
                        <?if(isset($arItem["DISPLAY_PROPERTIES"]["hall"])):?>
                            <li class="afisha-w__item"><span>Место:</span> <?=$arItem["DISPLAY_PROPERTIES"]["hall"]["DISPLAY_VALUE"]?></li>
                        <?endif;?>
                    </ul>
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
            <?if(isset($arItem["DISPLAY_PROPERTIES"]["age"])):?>
                <div class="age"><?=$arItem["DISPLAY_PROPERTIES"]["age"]["DISPLAY_VALUE"]?></div>
            <?endif;?>
        </div>
    </div>
<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
