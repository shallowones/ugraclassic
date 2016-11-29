<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

$UserDir = $arResult["USER_FIELDS"]["USER_DIR"];
$dir = $APPLICATION->GetCurDir();
?>

<div class="top-nav">
	
	<div class="top-nav__ava">
		<?if(strlen($arResult["USER_FIELDS"]["PERSONAL_PHOTO_75x75"]) > 1):?>
			<img src="<?=$arResult["USER_FIELDS"]["PERSONAL_PHOTO_75x75"]?>" class="top-nav__ava-img" />
		<?endif;?>
	</div><!-- top-nav__ava -->
	<h1 class="top-nav__h"><?=($arResult["USER_FIELDS"]["LAST_NAME"]." ".$arResult["USER_FIELDS"]["NAME"]." ".$arResult["USER_FIELDS"]["SECOND_NAME"])?></h1>
	
	<ul class="top-nav__lst font-2">
		<li class="top-nav__i<?if($dir==$UserDir):?> top-nav__i_stt_cur<?endif;?>">
			<a href="<?=$UserDir?>" class="top-nav__act">
				Профиль
			</a>
		</li>
		<li class="top-nav__i<?if($dir==$UserDir."posts/"):?> top-nav__i_stt_cur<?endif;?>">
			<a href="<?=$UserDir?>posts/" class="top-nav__act">
				<?=($arResult["MyProfile"] ? "Мои материалы" : "Материалы")?>
			</a>
		</li>
		<li class="top-nav__i<?if($dir==$UserDir."events/"):?> top-nav__i_stt_cur<?endif;?>">
			<a href="<?=$UserDir?>events/" class="top-nav__act">
				<?=($arResult["MyProfile"] ? "Мои события" : "События")?><?if($arResult["CNT_EVENTS"]>0):?> <span class="top-nav__act-num"><?=$arResult["CNT_EVENTS"]?></span><?endif;?></a>
			</a>
		</li>
		<li class="top-nav__i<?if($dir==$UserDir."subscribes/" || $dir==$UserDir."subscribers/"):?> top-nav__i_stt_cur<?endif;?>">
			<a href="<?=$UserDir?>subscribes/" class="top-nav__act">
				<?=($arResult["MyProfile"] ? "Мои коллеги" : "Коллеги")?>
			</a>
		</li>
		<?if($arResult["MyProfile"]):?>
		<?else:?>
		<?$bInSubscribes = in_array($arParams["USER_ID"], $arResult["SUBSCRIBES_ID"])?>
		<li class="top-nav__i top-nav__i_stl_no-border <?if($bInSubscribes):?>top-nav__i_stl_faded top-nav__i_tp_exit<?else:?>top-nav__i_tp_plus<?endif?>">
			<?if($bInSubscribes):?>
				<a href="#" class="top-nav__act user-unsubscribe">Отписаться</a>
			<?else:?>
				<a href="#" class="top-nav__act user-subscribe">Подписаться</a>
			<?endif;?>
		</li>
		<li class="top-nav__i top-nav__i_stl_no-border top-nav__i_tp_message">
			<a href="/messages/#/two_<?=$arParams["USER_ID"]?>/" class="top-nav__act">
				Написать сообщение
			</a>
		</li>
		<?endif;?>
	</ul>
	
	<div class="clearfix-block"></div>
	
</div><!-- top-nav -->

<script>
	$(function(){
		$('a.user-subscribe').live('click', function(e){
			RequestUserSubscribe(e);
		});
		
		$('a.user-unsubscribe').live('click', function(e){
			RequestUserSubscribe(e, 'Y');
		});
	})

	function RequestUserSubscribe(e, unsubscribe) {
		if (typeof('unsubscribe') == 'undefined') {
			unsubscribe = 'N';
		}
		$.get( 
			"/local/components/sh/user/user.subscribe.php", 
			{
				'from': <?=$arParams["CURRENT_USER"]?>,
				'to': <?=$arResult["USER_FIELDS"]['ID']?>,
				'unsubscribe': unsubscribe,
			},
			function(data){
				var string = JSON.parse(data);
				
				if (string.action == "S") {
				
					var link = $('a.user-subscribe');
					link.addClass('user-unsubscribe');
					link.removeClass('user-subscribe');					 
					link.parent().addClass('top-nav__i_stl_faded');
					link.parent().addClass('top-nav__i_tp_exit');
					link.parent().removeClass('top-nav__i_tp_plus');
					link.html('Отписаться');
				
				}
				
				else {
				
					var link = $('a.user-unsubscribe');
					link.addClass('user-subscribe');
					link.removeClass('user-unsubscribe');
					link.parent().addClass('top-nav__i_tp_plus');
					link.parent().removeClass('top-nav__i_stl_faded');
					link.parent().removeClass('top-nav__i_tp_exit');
					link.html('Подписаться');
				
				}
				
				
			}
		);
				
		e.preventDefault();	
	}
</script>

