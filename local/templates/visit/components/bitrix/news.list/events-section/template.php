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
	<?
	$prev_img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>700, 'height'=>600), BX_RESIZE_IMAGE_PROPORTIONAL, true);
	?>

	<div class="afisha-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>

			<?if ($arParams['ARCHIVE'] == 'Y'){echo '<div class="afisha-detail__img">';}?>
				<a href="<?if($arParams["ARCHIVE"]){echo $arItem["DETAIL_PAGE_URL"].'?archive=Y';}else{echo $arItem["DETAIL_PAGE_URL"];}?>">
					<img
						class="preview-picture"
						border="0"
						src="<?=$prev_img["src"]?>"
						width="220"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						/></a>

			<?if ($arParams['ARCHIVE'] == 'Y'){echo '</div>';}?>
		<?endif?>

		<div class="afisha-info">
			<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
				<div class="afisha-name">
					<a href="<?if($arParams["ARCHIVE"]){echo $arItem["DETAIL_PAGE_URL"].'?archive=Y';}else{echo $arItem["DETAIL_PAGE_URL"];}?>">
						<?echo $arItem["NAME"]?>
					</a>
				</div>
			<?endif;?>

			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
					<div class="afisha-text">
						<?
						$mess = mb_substr(strip_tags($arItem["PREVIEW_TEXT"]), 0, 330, 'UTF-8') . '...';
						echo $mess;
						?>
					</div>
				<?endif;?>

			<div class="info-1">
				<div class="afisha-date">
					<?if ($arParams['ARCHIVE'] == 'Y') {
						$date = ParseDateTime($arItem["ACTIVE_TO"], FORMAT_DATETIME);
					}else{
						$date = ParseDateTime($arItem["ACTIVE_FROM"], FORMAT_DATETIME);
					}?>
						
						<?
						$date2 = $date["DD"]." ".ToLower(GetMessage("MONTH_".intval($date["MM"])."_S"));
						echo "<div class='ddmm'>";
						echo $date2;
						echo "</div>";
						?>

						<?
						if (strlen($date["YYYY"])==4){
							echo "<div class='yyyy'>";
							echo $date["YYYY"];
							echo "</div>";
						}
						else{
							$str = substr($date["YYYY"],0,-1);
							echo "<div class='yyyy'>";
							echo $str;
							echo "</div>";
						}
						?>


						
						<?
						$time = ConvertDateTime($arItem["DISPLAY_PROPERTIES"]["date"]["DISPLAY_VALUE"],"HH:MI");
						if ($time!="00:00") {
							echo "<div class='time'>";
							echo $time;
							echo "</div>";
						}
						?>

                    <div class="hall">
                        <? echo $arItem['PROPERTIES']['municipality']['VALUE']; ?>
                        <? if ($arItem['PROPERTIES']['locality']['VALUE']):
                            echo ', ' . $arItem['PROPERTIES']['locality']['VALUE'];
                        endif; ?>
                        <? if ($arItem['DISPLAY_PROPERTIES']['hall']['VALUE']):
                            echo ', ' . $arItem['DISPLAY_PROPERTIES']['hall']['VALUE'];
                        endif; ?>
                    </div>

				</div>


				<?if(isset($arItem["DISPLAY_PROPERTIES"]["age"])):?>
					<div class="afisha-age">
						<?=$arItem["DISPLAY_PROPERTIES"]["age"]["DISPLAY_VALUE"]?>
					</div>
				<?endif;?> 

				<div class="clrb"></div>

			</div>
			
			


		</div>

<div class="clrb"></div>

	</div>
<?endforeach;?>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
