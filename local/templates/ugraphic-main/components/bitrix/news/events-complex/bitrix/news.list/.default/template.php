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
<div class="afisha-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<? $prev_img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>265, 'height'=>160), BX_RESIZE_IMAGE_EXACT, true);?>

	<div class="afisha-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
						class="preview-picture"
						border="0"
						src="<?=$prev_img["src"]?>"
						width="<?=$prev_img["width"]?>"
						height="<?=$prev_img["height"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						/></a>
		<?endif?>

		<div class="afisha-info">
			<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
				<div class="afisha-name">
					<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
						<?echo $arItem["NAME"]?>
					</a>
				</div>
			<?endif;?>


			<?if(isset($arItem["DISPLAY_PROPERTIES"]["age"])):?>
				<div class="afisha-age">
					<?=$arItem["DISPLAY_PROPERTIES"]["age"]["DISPLAY_VALUE"]?>
				</div>
			<?endif;?>


			<div class="info-1">
				<?if(isset($arItem["ACTIVE_FROM"])):?>
					<div class="afisha-date">
						<span>Дата: </span>
						<?
						$date = ParseDateTime($arItem["ACTIVE_FROM"], FORMAT_DATETIME);
						$date = $date["DD"]." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S"));
						echo $date;
						?><br/>
						<span>Время:</span>
						<?
						echo ConvertDateTime($arItem["ACTIVE_FROM"],"HH:MI");
						?>
					</div>
				<?endif;?>


				<?if(isset($arItem["DISPLAY_PROPERTIES"]["hall"])):?>
					<div class="afisha-date">
						<span>Место:</span> <?=$arItem["DISPLAY_PROPERTIES"]["hall"]["DISPLAY_VALUE"]?>
					</div>
				<?endif;?>

			</div>
			
			<div class="info-2">
				<?if(isset($arItem["DISPLAY_PROPERTIES"]["duration"])):?>
					<div class="afisha-date">
						<span>Продолжительность:</span> <?=$arItem["DISPLAY_PROPERTIES"]["duration"]["DISPLAY_VALUE"]?> минут
					</div>
				<?endif;?>

				<?if(isset($arItem["DISPLAY_PROPERTIES"]["cost"])):?>
					<div class="afisha-date">
						<span>Цена билета:</span> <?=$arItem["DISPLAY_PROPERTIES"]["cost"]["DISPLAY_VALUE"]?> руб.
					</div>
				<?endif;?>
			</div>

			<div class="tickets-info">
				<div class="afisha-date"><span>Куплено:</span> 303</div>
				<div class="afisha-date"><span>Осталось:</span> 200</div>
                <? if(strlen(trim($arItem['DISPLAY_PROPERTIES']['link_kassir']['VALUE'])) > 0): ?>
				    <a href="<?=$arItem['DISPLAY_PROPERTIES']['link_kassir']['VALUE']?>" class="no-link"><div class="buy-ticket">Купить билет</div></a>
                <? endif; ?>
			</div>

		</div>

<div class="clrb"></div>

	</div>
<?endforeach;?>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
