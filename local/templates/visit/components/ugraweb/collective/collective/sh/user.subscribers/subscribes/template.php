<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

$UserDir = $arParams["USER_DIR"];
$bMyProfile = $arParams["CURRENT_USER"] == $arParams["USER_ID"];
?>
<?if($_GET["subrs_ajax_request"] != "Y"):?>
<div class="inner_subscribes_sort">
	<div class="top-inf top-inf_botder-top_none">
		
		<div class="filter-nav filter-nav_lt_left">
			<ul class="filter-nav__lst">
				<li class="filter-nav__i filter-nav__i_stt_cur">
					<a href="<?=$UserDir?>subscribes/" class="filter-nav__act">Подписан <span class="filter-nav__num"><?=$arResult["CtnSubscribes"]?></span></a>
				</li>
				<li class="filter-nav__i">
					<a href="<?=$UserDir?>subscribers/" class="filter-nav__act">Подписчики <span class="filter-nav__num"><?=$arResult["CtnSubscribers"]?></span></a>
				</li>
			</ul>
		</div><!-- filter-nav -->				
		
		<div class="filter-nav filter-nav_lt_right">
			<div class="filter-nav__h">Упорядочить:</div>
			<ul class="filter-nav__lst">
				<li class="filter-nav__i filter-nav__i_sort_down filter-nav__i_stt_cur">
					<?$TypeOrder = $_GET["type_order"] == "asc" ? "desc" : "asc";?>
					<a href="#" data-sort="<?=$TypeOrder?>" class="filter-nav__act sort-elements">по популярности</a>
				</li>
			</ul>
		</div><!-- filter-nav -->
	</div><!-- top-inf -->
<?endif;?>
	<?if(count($arResult["Subscribes"]) > 0):?>
<?if($_GET["subrs_ajax_request"] != "Y"):?>
	<section class="posts items_users">
<?endif;?>
		<?foreach($arResult["Subscribes"] as $arSubscribe):?>
			<article class="post post_tp_btn item_user" data-sort="<?=$arSubscribe["CNT_SUBSCRIBERS"]?>_<?=$arSubscribe["ID"]?>">
				
				<header class="post__header">
					
					<div class="post__buttons">
						<?if($bMyProfile):?>
						<span class="post__buttons-i post__buttons-i_stl_exit button button_h_small button_color_3 button_icon_minus myprofile-unsubscribe" data-to="<?=$arSubscribe["ID"]?>">отписаться</span>
						<?endif;?>
					</div><!-- post__buttons -->
					
					<div class="post__avatar avatar">
						<?if(strlen($arSubscribe["PERSONAL_PHOTO_50x50"]) > 2):?>
						<img src="<?=$arSubscribe["PERSONAL_PHOTO_50x50"]?>" alt="" class="avatar__img">
						<?endif;?>
					</div><!-- avatar-->
					
					<h2 class="post__h post__h_space-bot_small">
						<a href="/user/<?=$arSubscribe["ID"]?>/" class="post__h-act"><?=($arSubscribe["LAST_NAME"]." ".$arSubscribe["NAME"]." ".$arSubscribe["SECOND_NAME"])?></a>
					</h2>
					
					<div class="post__props tdn">
						<?if($arSubscribe["WORK_POSITION"]):?>
						<div class="post__props-i"><span class="post__props-i-h">Должность:</span> <?=$arSubscribe["WORK_POSITION"]?></div>
						<?endif;?>
						<?if($arSubscribe["WORK_COMPANY"]):?>
						<div class="post__props-i"><span class="post__props-i-h">Место работы:</span> <a href="#"><?=$arSubscribe["WORK_COMPANY"]?></a></div>
						<?endif;?>
						<?if($arSubscribe["WORK_POSITION"]):?>
						<div class="post__props-i"><span class="post__props-i-h">Где находится:</span> <a href="#">Ханты-Мансийск</a></div>
						<?endif;?>
					</div>
					
				</header><!-- post__header -->
				
				<footer class="post__footer">

					<div class="post__inf-acts post__inf-acts_lt_left inf-acts">
						<?if(intval($arSubscribe["CNT_SUBSCRIBERS"]) > 0):?>
						<span class="inf-acts__i inf-acts__i_tp_people"><?=$arSubscribe["CNT_SUBSCRIBERS"]?></span>
						<?endif;?>
					</div><!-- post__acts -->
					<div class="clearfix-block"></div>
					
				</footer><!-- post__footer -->
				
			</article><!-- post -->
					
		<?endforeach;?>
		
		<?$arResult["rsUser"]->NavPrint("Записи", false, "text", "/local/components/sh/user.subscribers/sh.user.nav.php");?>

<?if($_GET["subrs_ajax_request"] != "Y"):?>
</section><!-- posts -->
<?endif?>
	<?endif;?>
<?if($_GET["subrs_ajax_request"] != "Y"):?>
</div>

<script>
	$(function(){
		// Удаление подписки
		$('span.myprofile-unsubscribe').live('click', function(e){
			var control = $(this);
			var DataTo = control.attr('data-to');
			$.get( 
				"/local/components/sh/user/user.subscribe.php", 
				{
					'from': <?=$arParams["CURRENT_USER"]?>,
					'to': DataTo,
					'unsubscribe': 'Y',
				},
				function(data){
					// Удаляем подписку из списка
					control.parent().parent().parent().fadeIn()
					control.parent().parent().parent().remove();
					var nNumb = 0;
					var count = 0;
					
					// Уменьшаем счетчик подписок вверху
					$('.filter-nav__num').each(function() {
						count++;
						if(count == 1) {
							FilterNavNum = $(this);
							nNumb = parseFloat(String(FilterNavNum.text()).match(/-?\d+(?:.\d+)?/, '') || 0, 10);
							if(nNumb > 0) {
								nNumb--;
							}
							nNumb = String(nNumb);
							FilterNavNum.text('('+nNumb+')');
						}
					});					
				}
			);
					
			e.preventDefault();	
		});		
		
		// Сортировка подписок
		$('a.sort-elements').live('click', function(e){
			var ob_type_sort = $('.sort-elements');
			var type_sort = ob_type_sort.attr('data-sort')
		
			var ctnSel = 0;
			var arStrId = [];
			var strId = "";
			$('.item_user').each(function() {
				strId = $(this).data('sort');
				arStrId[ctnSel] = strId;
				ctnSel++;
			});
			
			if(type_sort == 'desc') {
				arStrId.sort(function(a,b){
					if (a == b)
						return 0;
					if (a > b)
						return -1;
					else
						return 1;
				});
				
				ob_type_sort.attr('data-sort',"asc");
				ob_type_sort.parent().removeClass('filter-nav__i_sort_up');
				ob_type_sort.parent().addClass('filter-nav__i_sort_down');
			}
			else {
				arStrId.sort(function(a,b){
					if (a == b)
						return 0;
					if (a > b)
						return 1;
					else
						return -1;
				});
				
				ob_type_sort.attr('data-sort',"desc");
				ob_type_sort.parent().removeClass('filter-nav__i_sort_down');
				ob_type_sort.parent().addClass('filter-nav__i_sort_up');
			}
			
			ob_items_users = $('.items_users');
			
			var str_append = "";
			var str_tr = '';
			for(i=0; i < arStrId.length; i++) {				
				str_tr = ob_items_users.find('[data-sort='+arStrId[i]+']').html();
				str_append += '<article class="post post_tp_btn item_user" data-sort="'+arStrId[i]+'">'+str_tr+'</article>';

			}
			
			var PostsMore = $('.posts__more').html();
			if(typeof(PostsMore) !== 'undefined') {
				str_append = str_append+'<div class="posts__more">'+PostsMore+'</div>';
			}
			ob_items_users.html(str_append);
			
			e.preventDefault();
		});
		
		
		// Подгрузка подписок
		$('span.more-btn').live('click', function(e){
			var control = $(this);
			control.parent().remove();
			var NavNum = control.attr('data-nav-num');
			var PagenNum = control.attr('data-pagen-num');
			
			$.get( 
				"/local/components/sh/user.subscribers/subscribes.more.php", 
				{
					'PAGEN_1': PagenNum,
					'user_id': <?=$arParams["USER_ID"]?>,
					'user_dir': '<?=$arParams["USER_DIR"]?>',
					'cur_user': <?=$arParams["CURRENT_USER"]?>,
					'item_count': <?=$arParams["ITEM_COUNT"]?>
				},
				function(data){
					$('.posts').append(data);
				}
			);
			
		});
		
	});

</script>
<?endif;?>