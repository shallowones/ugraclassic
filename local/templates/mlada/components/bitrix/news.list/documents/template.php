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
<div class="doc-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<? 
		$link = $arItem["DISPLAY_PROPERTIES"]["file"]["FILE_VALUE"];
		$link = $link["SRC"];
		$type = stristr($link, '.');
	?>

	<div class="doc-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<a href="<?=$link?>" class="doc-link">
			<div class="doc-ico 
			<?
				if (($type==".doc")||($type==".docx")){
					echo "doc-docx";
				} 
				elseif (($type==".xlsx")||($type==".xls")||($type==".xltx")||($type==".xlt")) {
					echo "doc-excel";
				}
				elseif (($type==".ppt")||($type==".pptx")){
					echo "doc-powerp";
				}
				elseif ($type==".pdf"){
					echo "doc-pdf";
				}
				elseif (($type==".jpg")||($type==".jpeg")||($type==".png")){
					echo "doc-img";
				}
				elseif (($type==".zip")||($type==".rar")){
					echo "doc-rar";
				}
				else {
					echo "doc-none";
				}
			?>
			">
			</div>
			<div class="doc-name"><?=$arItem["NAME"]?></div>
		</a>
	<div style="clear:both"></div>
	</div>
	<div style="clear:both"></div>

<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
