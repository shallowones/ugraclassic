<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>
<div class="pager">

	<? if ($arResult['NavPageNomer'] > 1): ?>
		<a class="pager__link pager__link_arrow" href="<?echo $arResult['sUrlPath']."?".$strNavQueryString."PAGEN_".$arResult['NavNum']."=".($arResult['NavPageNomer']-1)?>">
			Предыдущая
		</a>
	<? else: ?>
		<a class="pager__link pager__link_arrow">
			Предыдущая
		</a>
	<? endif; ?>
	<?if ($arResult['nStartPage'] > 2):?>

		<a class="pager__link" href="<?echo $arResult['sUrlPath']."?".$strNavQueryString."PAGEN_".$arResult['NavNum']."=1"?>">
			1
		</a>



		<a class="pager__link">
			...
		</a>

	<? endif; ?>
	<?for ($i=$arResult['nStartPage']; $i<=$arResult['nEndPage'];$i++)
	{?>

		<a href="?<?echo $arResult["NavQueryString"]."&PAGEN_".$arResult['NavNum']."=".$i?>" class="pager__link <?if ($i == $arResult['NavPageNomer']):?>pager__link_active<?endif;?>">
			<?=$i?>
		</a>

	<?}?>
	<?if ($arResult['nEndPage'] < $arResult['NavPageCount']-1):?>

		<a class="pager__link">
			...
		</a>


		<a class="pager__link" href="<?echo $arResult['sUrlPath']."?".$strNavQueryString."PAGEN_".$arResult['NavNum']."=".$arResult['NavPageCount']?>">
			<?=$arResult['NavPageCount']?>
		</a>

	<? endif; ?>

	<? if ($arResult['NavPageNomer'] < $arResult['NavPageCount']): ?>
		<a class="pager__link pager__link_arrow" href="<?echo $arResult['sUrlPath']."?".$strNavQueryString."PAGEN_".$arResult['NavNum']."=".($arResult['NavPageNomer']+1)?>">
			Следующая
		</a>
	<? else: ?>
		<a class="pager__link pager__link_arrow">
			Следующая
		</a>
	<? endif; ?>


</div>