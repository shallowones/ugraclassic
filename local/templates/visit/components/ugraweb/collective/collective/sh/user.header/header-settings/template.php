<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

$SettingDir = $arResult["USER_FIELDS"]["SETTINGS_DIR"];
$dir = $APPLICATION->GetCurDir();
?>

<div class="top-nav">
	
	<h1 class="top-nav__h">Настройки</h1>
	
		<ul class="top-nav__lst font-2">
			<li class="top-nav__i<?if($dir=="/user/settings/"):?> top-nav__i_stt_cur<?endif?>">
				<a href="<?=$SettingDir?>" class="top-nav__act">
					Персональная информация
				</a>
			</li>
			<li class="top-nav__i<?if($dir=="/user/settings/account/"):?> top-nav__i_stt_cur<?endif;?>">
				<a href="<?=$SettingDir?>account/" class="top-nav__act">
					Почта и пароль
				</a>
			</li>
			<li class="top-nav__i<?if($dir=="/user/settings/notifications/"):?> top-nav__i_stt_cur<?endif;?>">
				<a href="<?=$SettingDir?>notifications/" class="top-nav__act">
					Уведомления
				</a>
			</li>
		</ul>
		
	<div class="clearfix-block"></div>
	
</div><!-- top-nav -->