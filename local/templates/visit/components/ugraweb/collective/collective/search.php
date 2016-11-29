<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?

$APPLICATION->SetTitle("Поиск анкет");

if(!$arResult['MyProfile']) {
    $CurUser = CUser::GetID();
    LocalRedirect('/profile/'.$CurUser.'/search/');
}

use \UW\DataHelper as DataHelper;
$GLOBALS['flt_users_list'] = array();
$this->SetViewTarget('filter');
$GLOBALS['flt_users_list'] = $APPLICATION->IncludeComponent("ugraweb:users.filter","",Array(),false);

$this->EndViewTarget();
// определяем группу прошедших модерацию анкет
$rsGroups = CGroup::GetList(($field = "c_sort"), ($f_order = "desc"), Array("STRING_ID" => 'user_moder'));
if ($arGroup = $rsGroups->Fetch()) {
    // объявляем фильтр - "отобразить анкету, если пользователь входит в группу активированных анкет"
    $GLOBALS['flt_users_list']["GROUPS_ID"] = array($arGroup['ID']);

    // если текущий пользователь сам не входит в группу активированных
    if(!in_array($arGroup['ID'], CUser::GetUserGroupArray()))
        LocalRedirect('/profile/'.CUser::GetID().'/');
}

$arJsFltUserList = CUtil::PhpToJSObject($GLOBALS['flt_users_list'], false, true, true);

$hl_user_friends = DataHelper::HL_USER_FRIENDS;
?>
<div class="users">
    <div class="users__c">
        <div class="users-count"><?$APPLICATION->ShowViewContent('count_anketa');?></div>
        <?
        $arRes = $APPLICATION->IncludeComponent("ugraweb:search.list", "", Array(
            "USER_ID" => CUser::GetID(),
            "FILTER_NAME" => "flt_users_list",
            "ITEMS_COUNT" => 6, // сколько юзеров выводить
            "FRIEND_FOR_VISITORS" => $hl_user_friends,
        ),
            false
        );
        ?>
    </div>
    <div class="users-filter">
        <?$APPLICATION->ShowViewContent('filter');?>
    </div>
</div>

<?$NavPageCount = $arRes['NavPageCount']?>
<?$this->SetViewTarget('count_anketa');?>
<?echo $arRes['NavRecordCount']?> <?=\UW\DataHelper::getNumEnding($arRes['NavRecordCount'], Array("анкета","анкеты","анкет"));?>
<?$this->EndViewTarget();?>


<script>
    $(function() {
        FriendAdd ();
    });

    function FriendAdd ()

    {
        $(".users-i__action.friend").on('click',function(e)
            {
                var button = $(this);
                var uid = $(this).data("id");

                if (button.hasClass('friend-add'))
                {
                    $.ajax({
                        url: "/local/ajax/registered.user.php?action=add-to-friends-list&friend-uid="+uid,
                        success: function (result)
                        {
                            if (result > 0)
                            {
                                button.text("Убрать из друзей");
                                button.removeClass("friend-add");
                                button.addClass("friend-remove");
                            }
                        }
                    });

                }
                else if (button.hasClass('friend-remove'))
                {
                    $.ajax({
                        url: "/local/ajax/registered.user.php?action=remove-from-friends-list&friend-uid="+uid,
                        success: function (result)
                        {
                            if (result > 0)
                            {
                                button.text("Добавить в друзья");
                                button.removeClass("friend-remove");
                                button.addClass("friend-add");
                            }
                        }
                    });
                }
                e.preventDefault();
            }
        );
    }


    /* http://falbar.ru/article/id/50 */


    $(document).ready(function(){

        /* Переменная-флаг для отслеживания того, происходит ли в данный момент ajax-запрос. В самом начале даем ей значение false, т.е. запрос не в процессе выполнения */
        var inProgress = false;
        /* Начальное значение постранички */
        var startFrom = 2;

        var content = $("#list_anketa"),
            loading = "Загрузка...";

        /* Используйте вариант $('#more').click(function() для того, чтобы дать пользователю возможность управлять процессом, кликая по кнопке "Дальше" под блоком статей (см. файл index.php) */

        var block = $(".users__c");
        var holdPos = block.offset().top + block.height() - $(window).height();

        $(window).scroll(function() {

            /* Если высота окна + высота прокрутки больше или равны высоте всего документа и ajax-запрос в настоящий момент не выполняется, то запускаем ajax-запрос */
            if(
                ($(window).scrollTop() > holdPos) && !inProgress &&
                startFrom <= <?=$NavPageCount?>
            ) {

                var objFltUserList = new Object(<?=$arJsFltUserList?>);
                $.ajax({
                    /* адрес файла-обработчика запроса */
                    url: '/local/components/ugraweb/search.list/ajax.jscroll.php',
                    /* метод отправки данных */
                    type: "POST",
                    /* данные, которые мы передаем в файл-обработчик */
                    data: {
                        "PAGEN_1" : startFrom,
                        hl_user_friends : '<?=$hl_user_friends?>',
                        'objFltUserList[]' : objFltUserList
                    },
                    /* что нужно сделать до отправки запрса */
                    beforeSend: function() {
                        /* меняем значение флага на true, т.е. запрос сейчас в процессе выполнения */
                        inProgress = true;
                        content.append("<div class='jscroll-loading'>" + loading + "</div>");
                    }

                    /* что нужно сделать по факту выполнения запроса */
                }).done(function(data){


                    /* Если массив не пуст (т.е. статьи там есть) */
                    if(data){

                        content.append(data);
                        content.find(".jscroll-loading").slideUp(700, function(){

                            $(this).remove();
                        });

                        /* По факту окончания запроса снова меняем значение флага на false */
                        inProgress = false;
                        // Увеличиваем на 1 постраничку
                        startFrom += 1;

                        $(".users-i__action.friend").unbind('click');
                        FriendAdd ();

                    }});
            }
        });
    });


</script>