<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

$UserDir = $arParams["USER_DIR"];
?>
<?if($_GET["subrs_ajax_request"] != "Y"):?>
<div class="inner_subscribes_sort">
	<div class="top-inf top-inf_botder-top_none">
		
		<div class="filter-nav filter-nav_lt_left">
			<ul class="filter-nav__lst">
				<li class="filter-nav__i">
					<a href="<?=$UserDir?>subscribes/" class="filter-nav__act">Подписан <span class="filter-nav__num"><?=$arResult["CtnSubscribes"]?></span></a>
				</li>
				<li class="filter-nav__i filter-nav__i_stt_cur">
					<a href="<?=$UserDir?>subscribers/" class="filter-nav__act">Подписчики <span class="filter-nav__num"><?=$arResult["CtnSubscribers"]?></span></a>
				</li>
			</ul>
		</div><!-- filter-nav -->				
		
		<div class="filter-nav filter-nav_lt_right">
			<div class="filter-nav__h">Упорядочить:</div>
			<ul class="filter-nav__lst">
				<li class="filter-nav__i filter-nav__i_sort_up filter-nav__i_stt_cur">
					<a href="#" class="filter-nav__act sort-elements" data-sort="asc">по популярности</a>
				</li>
			</ul>
		</div><!-- filter-nav -->
	</div><!-- top-inf -->
<?endif;?>
	
	<?if(count($arResult["Subscribers"]) > 0):?>
<?if($_GET["subrs_ajax_request"] != "Y"):?>
		<div class="subscribers">
			<ul class="subscribers__lst items_users">
<?endif;?>
		<?$count = 0;?>
		<?foreach($arResult["Subscribers"] as $arSubscriber):?>
			<li class="subscribers__i js-same-height item_user" data-sort="<?=$arSubscriber["CNT_SUBSCRIBERS"]?>_<?=$arSubscriber["ID"]?>">
				<div class="subscribers__teaser simple-teaser">
					<div class="simple-teaser__col-img">
						<?if(strlen($arSubscriber["PERSONAL_PHOTO_50x50"]) > 2):?>
						<a href="/user/<?=$arSubscriber["ID"]?>/" class="simple-teaser__img-act">
							<img src="<?=$arSubscriber["PERSONAL_PHOTO_50x50"]?>" alt="" class="simple-teaser__img">
						</a>
						<?endif;?>
					</div>
					<div class="simple-teaser__body">
						<a href="/user/<?=$arSubscriber["ID"]?>/" class="simple-teaser__h">
							<?=($arSubscriber["LAST_NAME"]." ".$arSubscriber["NAME"]." ".$arSubscriber["SECOND_NAME"])?>
						</a>
						<div class="subscribers__buttons">
							<?if($arParams["CURRENT_USER"] != $arSubscriber["ID"]):?>
								<a href="/messages/#/two_<?=$arSubscriber["ID"]?>/" class="subscribers__btn small-icon-btn small-icon-btn_tp_mess" title="Написать"></a>
								<?if(!in_array($arSubscriber["ID"], $arResult["SUBSCRIBES_ID"])):?>
									<div class="subscribers__btn small-icon-btn small-icon-btn_tp_add subrs-subscribe" title="Подписаться" data-to="<?=$arSubscriber["ID"]?>"></div>
								<?else:?>
									<div class="subscribers__btn small-icon-btn small-icon-btn_tp_del subrs-unsubscribe" title="Отписаться" data-to="<?=$arSubscriber["ID"]?>"></div>
								<?endif;?>
							<?endif;?>
						</div><!-- subscribers__buttons -->
					</div><!-- simple-teaser__body -->
				
				</div><!-- simple-teaser -->
			</li>
		<?endforeach;?>
<?if($_GET["subrs_ajax_request"] != "Y"):?>
			</ul>			
			<div class="clearfix-block"></div>
		</div><!-- subscribers -->
		<br /><br />
<?endif?>
		<?$arResult["rsUserSbrs"]->NavPrint("Записи", false, "text", "/local/components/sh/user.subscribers/sh.user.nav.php");?>
	<?endif;?>
<?if($_GET["subrs_ajax_request"] != "Y"):?>
</div>

<script>
	$(function(){
		// Подписка на подписчика
		$('div.subrs-subscribe').live('click', function(e){
			subrsRequestUserSubscribe(e, 'N', this);
		});
		
		// Отписаться от подписчика
		$('div.subrs-unsubscribe').live('click', function(e){
			subrsRequestUserSubscribe(e, 'Y', this);
		});
		
		// Сортировка подписчиков
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
				str_append += '<li class="subscribers__i js-same-height item_user" data-sort="'+arStrId[i]+'">'+str_tr+'</li>';

			}
			ob_items_users.html(str_append);
			
			e.preventDefault();
		});
		
		// Подгрузка подписчиков
		$('span.more-btn').live('click', function(e){
			var control = $(this);
			control.parent().hide();
			var NavNum = control.attr('data-nav-num');
			var PagenNum = control.attr('data-pagen-num');
			
			$.get( 
				"/local/components/sh/user.subscribers/subscribes.more.php", 
				{
					'PAGEN_2': PagenNum,
					'user_id': <?=$arParams["USER_ID"]?>,
					'user_dir': '<?=$arParams["USER_DIR"]?>',
					'cur_user': <?=$arParams["CURRENT_USER"]?>,
					'item_count': <?=$arParams["ITEM_COUNT"]?>,
					'subscribers': 'Y'
				},
				function(data){
					var temp = '<div>'+data+'</div>';
					var obTemp = $(temp);
					var PostsMore = obTemp.find('.posts__more');
					var htmlPostsMore = '';					
					if(PostsMore.length > 0) {
						htmlPostsMore = PostsMore.html();
						PostsMore.remove();
					}
					
					$('.items_users').append(obTemp.html());
					if(htmlPostsMore != '') {
						$('.posts__more').html(htmlPostsMore);
						$('.posts__more').show();
					}
					else {
						$('.posts__more').remove();
					}
				}
			);
			
		});
		
	});

	// Непосредственно подписка/отписка
	function subrsRequestUserSubscribe(e, unsubscribe, control) {
		if (typeof('unsubscribe') == 'undefined') {
			unsubscribe = 'N';
		}
		var obLink = $(control);
		var DataTo = obLink.attr('data-to');
		$.get( 
			"/local/components/sh/user/user.subscribe.php", 
			{
				'from': <?=$arParams["CURRENT_USER"]?>,
				'to': DataTo,
				'unsubscribe': unsubscribe,
			},
			function(data){
				var string = JSON.parse(data);
				
				if (string.action == "S") {
				
					obLink.addClass('subrs-unsubscribe');
					obLink.removeClass('subrs-subscribe');
					obLink.addClass('small-icon-btn_tp_del');
					obLink.removeClass('small-icon-btn_tp_add');
					obLink.attr('title','Отписаться');
				
				}
				
				else {
				
					obLink.addClass('subrs-subscribe');
					obLink.removeClass('subrs-unsubscribe');
					obLink.addClass('small-icon-btn_tp_add');
					obLink.removeClass('small-icon-btn_tp_del');
					obLink.attr('title','Подписаться');
				
				}
				
				// Изменяем счетчик подписок вверху
				var nNumb = 0;
				var count = 0;
				$('.filter-nav__num').each(function() {
					count++;
					if(count == 1) {
						FilterNavNum = $(this);
						nNumb = parseFloat(String(FilterNavNum.text()).match(/-?\d+(?:.\d+)?/, '') || 0, 10);
						if (string.action == "S") {
							nNumb++;
						}
						else {
							if(nNumb > 0) {
								nNumb--;
							}
						}
						nNumb = String(nNumb);
						FilterNavNum.text('('+nNumb+')');
					}
				});
				
			}
		);
				
		e.preventDefault();	
	}
</script>
<?endif;?>