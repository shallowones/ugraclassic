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
<div class="online-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="online-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?
		//Парсим гугловый iframe и получаем ID трансляции
			$str = explode('&quot;', $arItem["DISPLAY_PROPERTIES"]["youtube"]["DISPLAY_VALUE"]);
			$str2=$str[5];
			$str2 = explode('/', $str2);
			$url=$str2[4];
		//конец парсера
		?>
	
		<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem["NAME"]?>">
			<?//Тянем превью трансляции с гугла?>

			<div class="img-online">
				<div class="camera"></div>
				<img  src="//img.youtube.com/vi/<?=$url?>/mqdefault.jpg" width="300" height="160" title="<?=$arItem["NAME"]?>" alt="<?=$arItem["NAME"]?>">
			</div>
		</a>


		<div class="online-info">

			<?if(isset($arItem["DISPLAY_PROPERTIES"]["date"])):?>
				<div class="online-date">
					<span>Дата:</span>
					<?
					$date = ParseDateTime($arItem["DISPLAY_PROPERTIES"]["date"]["DISPLAY_VALUE"], FORMAT_DATETIME);
					$date = $date["DD"]." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S"));
					echo $date;
					?>
					<span style="margin-left: 25px;">Время:</span>
					<?
					echo ConvertDateTime($arItem["DISPLAY_PROPERTIES"]["date"]["DISPLAY_VALUE"],"HH:MI");
					?>
				</div>
			<?endif;?>

			<div class="online-name-text-box">
				<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
					<div class="online-name">
						<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem["NAME"]?>">
							<?echo $arItem["NAME"]?>
						</a>
					</div>
				<?endif;?>


				<?if(isset($arItem["DISPLAY_PROPERTIES"]["age"])):?>
					<div class="online-age">
						<?=$arItem["DISPLAY_PROPERTIES"]["age"]["DISPLAY_VALUE"]?>
					</div>
				<?endif;?>


				<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
					<div class="preview-text">
						<?echo $arItem["PREVIEW_TEXT"];?>
					</div>
				<?endif;?>
			</div>
		</div>

	<div class="clrb"></div>
	</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
