<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
?>

<?if(count($arResult["USER_FIELDS"]) > 0):?>

	<div class="sidebar-block">
	
		<?if(strlen($arResult["USER_FIELDS"]["PERSONAL_PHOTO_ORIGINAL"]) > 1):?>
		<div class="big-ava">
			<img src="<?=$arResult["USER_FIELDS"]["PERSONAL_PHOTO_ORIGINAL"]?>" alt="" class="big-ava__img">
		</div><!-- big-ava -->
		<?endif;?>
				
		<h2 class="sidebar-h sidebar-h_stl_bot-space">О себе</h2>
		
		<?if($arResult["USER_FIELDS"]["PERSONAL_NOTES"]):?>
		<p><?=$arResult["USER_FIELDS"]["PERSONAL_NOTES"]?></p>
		<?endif;?>
		
		<?$cEnd = $arResult["USER_FIELDS"]["PERSONAL_GENDER"] == "F" ? "на" : "н";?>
		<p>Зарегистрирова<?=$cEnd?>: <?=array_shift(explode(" ",$arResult["USER_FIELDS"]["DATE_REGISTER"]))?></p>
		
	</div><!-- sidebar-block -->

	<?if(!$arResult["IS_DIR_POSTS"]):?>
		<?if(count($arResult["USER_FIELDS"]["CLUBS_CURATOR"]) > 0):?>
		<div class="sidebar-block">
			<h2 class="sidebar-h sidebar-h_stl_bot-space">Курирует</h2>
			<?foreach($arResult["USER_FIELDS"]["CLUBS_CURATOR"] as $arClubCurator):?>
			<div class="simple-teaser">
				<div class="simple-teaser__col-img">
					<img src="<?=$arClubCurator["PREVIEW_PICTURE"]?>" alt="" class="simple-teaser__img">
				</div>
				<div class="simple-teaser__body">
					<a href="<?=$arClubCurator["DETAIL_PAGE_URL"]?>" class="simple-teaser__h"><?=$arClubCurator["NAME"]?></a><br />
					<span class="font-color-2"><?=$arClubCurator["PREVIEW_TEXT"]?></span>
				</div><!-- simple-teaser__body -->
			</div><!-- simple-teaser -->
			<?endforeach;?>

		</div><!-- sidebar-block -->
		<?endif;?>
		
		<?if(count($arResult["USER_FIELDS"]["CLUBS_MODERATOR"]) > 0):?>
		<div class="sidebar-block">
			<h2 class="sidebar-h sidebar-h_stl_bot-space">Модерирует клубы</h2>
			
			<?foreach($arResult["USER_FIELDS"]["CLUBS_MODERATOR"] as $arClubModerator):?>
			<div class="simple-teaser">
				<div class="simple-teaser__col-img">
					<img src="<?=$arClubModerator["PREVIEW_PICTURE"]?>" alt="" class="simple-teaser__img">
				</div>
				<div class="simple-teaser__body">
					<a href="<?=$arClubModerator["DETAIL_PAGE_URL"]?>" class="simple-teaser__h"><?=$arClubModerator["NAME"]?></a><br />
					<span class="font-color-2"><?=$arClubModerator["PREVIEW_TEXT"]?></span>
				</div><!-- simple-teaser__body -->
			</div><!-- simple-teaser -->
			<?endforeach;?>

		</div><!-- sidebar-block -->
		<?endif;?>
		
		<?$count = 0; $total = count($arResult["USER_FIELDS"]["CLUBS"]);?>
		<?if($total > 0):?>
		<div class="sidebar-block show-more">
		<h2 class="sidebar-h">Состоит в клубах</h2>
		
			<div class="tdn">
				<?foreach($arResult["USER_FIELDS"]["CLUBS"] as $arClub):?>
					<?$count++;?>
					<a href="<?=$arClub["DETAIL_PAGE_URL"]?>"><?=$arClub["NAME"]?></a><?if($total>1 && $count<$total):?>, <?endif;?>
				<?endforeach;?>
			</div>

		</div><!-- sidebar-block -->
		<?endif;?>	
	<?endif;?>


<?endif;?>