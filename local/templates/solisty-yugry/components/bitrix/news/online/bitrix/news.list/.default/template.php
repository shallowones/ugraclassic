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
				<img  src="//img.youtube.com/vi/<?=$url?>/mqdefault.jpg" title="<?=$arItem["NAME"]?>" alt="<?=$arItem["NAME"]?>">
			</div>

				<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
					<div class="online-name">
						<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem["NAME"]?>">
							<?echo $arItem["NAME"]?>
						</a>
					</div>
				<?endif;?>
		</a>



	<div class="clrb"></div>
	</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
