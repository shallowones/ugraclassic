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


<div class="form form_space_bot form_space_top">
	
	<?if(count($arResult["USER_FIELDS"]["UF_WORK_PROFILE"]) > 0):?>
	<div class="form-line form-line_w_fluid form-line_space-bot_more">
		<div class="form-line__cel form-line__cel_lt_left">
			<div class="form-label">Род деятельности</div>
		</div>
		<div class="form-line__cel form-line__cel_lt_right">
			<div class="form-content-h"><b><?=implode(",&nbsp;", $arResult["USER_FIELDS"]["UF_WORK_PROFILE"]);?></b></div>
		</div>
	</div><!-- form-line -->
	<?endif;?>
	
	<?if(count($arResult["USER_FIELDS"]["SPECIALISM"]) > 0):?>	
	<div class="form-line form-line_w_fluid">
		<div class="form-line__cel form-line__cel_lt_left">
			<span class="form-label form-label_width_same">Специализация</span> 
		</div>
		<div class="form-line__cel form-line__cel_lt_right">
			
			<ul class="form-el-list font-small font-color-3">
				<?foreach($arResult["USER_FIELDS"]["SPECIALISM"] as $arItem):?>
					<li class="form-el-list__i">
						<?if($arItem["NAME"]):?>
							<?=$arItem["NAME"]?>
						<?endif;?>
						<?if(intval($arItem["UF_EXPERIENCE"]) > 0):?>
						<span class="font-color-2">
							(стаж <?=$arItem["UF_EXPERIENCE"]?> <?=ShService::getNumEnding($arItem["UF_EXPERIENCE"], Array("год","года","лет"))?>)
						</span>
						<?endif;?>
					</li>
				<?endforeach;?>
			</ul>

		</div>
	</div><!-- form-line -->
	<?endif;?>
	
	<?if($arResult["USER_FIELDS"]["PERSONAL_BIRTHDAY_FORMAT"]):?>
	<div class="form-line form-line_w_fluid">
		<div class="form-line__cel form-line__cel_lt_left">
			<span class="form-label form-label_width_same">День рождения</span> 
		</div>
		<div class="form-line__cel form-line__cel_lt_right">
			<div class="font-small">
				<?=$arResult["USER_FIELDS"]["PERSONAL_BIRTHDAY_FORMAT"]?>
			</div>
		</div>
	</div><!-- form-line -->
	<?endif;?>
	
	<?if($arResult["USER_FIELDS"]["CITY_FORMAT"]):?>
	<div class="form-line form-line_w_fluid-2">
		<div class="form-line__cel form-line__cel_lt_left">
			<span class="form-label">Где находится</span> 
		</div>
		<div class="form-line__cel form-line__cel_lt_right">

			<p class="font-small">Россия, <?if($arResult["USER_FIELDS"]["REGION_FORMAT"]):?><?=$arResult["USER_FIELDS"]["REGION_FORMAT"]?>,<?endif;?> <?=$arResult["USER_FIELDS"]["CITY_FORMAT"]?></p>
			<?$APPLICATION->IncludeComponent("bitrix:map.yandex.view", ".default", array(
				"INIT_MAP_TYPE" => "MAP",
				"MAP_DATA" => str_replace("\\", "", $arResult["USER_FIELDS"]["MAP_DATA"]),
				"MAP_WIDTH" => "500",
				"MAP_HEIGHT" => "280",
				"CONTROLS" => array(
					0 => "ZOOM",
				),
				"OPTIONS" => array(
					0 => "ENABLE_SCROLL_ZOOM",
					1 => "ENABLE_DBLCLICK_ZOOM",
					2 => "ENABLE_DRAGGING",
				),
				"MAP_ID" => "ymap"
				),
				false
			);?>

		</div><!-- form-line__cel -->
	</div><!-- form-line -->
	<?endif;?>
	
	<?if(count($arResult["USER_FIELDS"]["EDUCATION"]) > 0):?>
	<div class="form-line form-line_w_fluid">
		<div class="form-line__cel form-line__cel_lt_left">
			<span class="form-label form-label_width_same">Образование</span> 
		</div>
		<div class="form-line__cel form-line__cel_lt_right">

		<?foreach($arResult["USER_FIELDS"]["EDUCATION"] as $arItem):?>
			<div class="font-small">
				<ul class="form-el-list form-el-list_space_bot">					
					<li class="form-el-list__i">
						<?if($arItem["UF_EDU_COMPANY"]):?>
							<b><?=$arItem["UF_EDU_COMPANY"]?></b>
						<?endif;?>
					</li>
					<li class="form-el-list__i">
						<?if($arItem["UF_SPECIALTY"]):?>
							<?=$arItem["UF_SPECIALTY"]?>
						<?endif;?>
					</li>
					<li class="form-el-list__i">
						<?if($arItem["UF_BEGIN_YEAR"]):?>
							<?=$arItem["UF_BEGIN_YEAR"]?>
						<?endif;?>
						<?if($arItem["UF_END_YEAR"]):?>
							— <?=$arItem["UF_END_YEAR"]?>
						<?endif;?>
					</li>
				</ul>
			</div>
		<?endforeach;?>

		</div>
	</div><!-- form-line -->
	<?endif;?>
	
	<?if(($arResult["USER_FIELDS"]["WORK_COMPANY"] && $arResult["USER_FIELDS"]["WORK_POSITION"]) || 
		count($arResult["USER_FIELDS"]["CAREER"]) > 0):?>	
	<div class="form-line form-line_w_fluid">
		<div class="form-line__cel form-line__cel_lt_left">
			<span class="form-label form-label_width_same">Место работы</span> 
		</div>
		<div class="form-line__cel form-line__cel_lt_right">

			<?if($arResult["USER_FIELDS"]["WORK_COMPANY"] && $arResult["USER_FIELDS"]["WORK_POSITION"]):?>
			<div class="font-small">
				<ul class="form-el-list form-el-list_space_bot">
					<li class="form-el-list__i">
						<b><?=$arResult["USER_FIELDS"]["WORK_POSITION"]?></b> <span class="font-color-2">(основное место работы)</span>
					</li>
					<li class="form-el-list__i">
						<div class="font-color-3"><?=$arResult["USER_FIELDS"]["WORK_COMPANY"]?></div>
					</li>
					<li class="form-el-list__i">
						<?=$arResult["USER_FIELDS"]["UF_BEGIN_WORK_FORMAT"]?> — продолжаю работать
					</li>
				</ul>
			</div>
			<?endif;?>
			
			<?if(count($arResult["USER_FIELDS"]["CAREER"]) > 0):?>
				<?foreach($arResult["USER_FIELDS"]["CAREER"] as $arItem):?>
				<div class="font-small">
					<ul class="form-el-list form-el-list_space_bot">
						<li class="form-el-list__i">
							<?if($arItem["UF_POSITION"]):?>
								<b><?=$arItem["UF_POSITION"]?></b>
							<?endif;?>
						</li>
						<li class="form-el-list__i">
							<div class="font-color-3">
								<?if($arItem["UF_COMPANY"]):?>
									<?=$arItem["UF_COMPANY"]?>
								<?endif;?>
							</div>
						</li>
						<li class="form-el-list__i">
							<?if($arItem["UF_BEGIN_DATE"]):?>
								<?=$arItem["UF_BEGIN_DATE"]?>
							<?endif;?>
							<?if($arItem["UF_END_DATE"]):?>
								— <?=$arItem["UF_END_DATE"]?>
							<?endif;?>
							<?if($arItem["UF_ACTUAL"] == "Y"):?>
								— продолжаю работать
							<?endif;?>
						</li>
					</ul>
				</div>
				<?endforeach;?>
			<?endif;?>	
			
		</div>
	</div><!-- form-line -->
	<?endif;?>
	
</div><!-- form -->

<?endif;?>