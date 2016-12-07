$(document).ready(function () {
    // календарь фильтра
    var calendar = $('.dates__item');
    calendar.on('click', function () {
        $(this).find('input').each(function () {
            BX.calendar({
                node: this,
                field: this,
                bTime: false
            });
        });
    });

    Date.prototype.daysInMonth = function (year, month) {
        return (new Date(year, month, 0)).getDate();
    };

    $('.categories__item').on('click', function () {
        var parentID = $(this).parent().attr("id");
        var value = $(this).attr('value');
        var dateStart = $('#date_start');
        var dateEnd = $('#date_end');
        var countDaysOfMonth = '';
        if (parentID == 'sections') {
            var input = $('<input/>', {
                'value': value,
                'type': 'hidden',
                'name': parentID
            });
            $('#' + parentID + ' .categories__item').each(function () {
                $(this).removeClass('cat-active');
                $(this).find('input').each(function () {
                    $(this).remove();
                })
            });
            $(this).addClass('cat-active');
            $(this).append(input);
        } else if (parentID == 'months') {
            dateStart.val('01.' + value);
            var arDate = value.split('.');
            countDaysOfMonth = new Date().daysInMonth(arDate[1], arDate[0]);
            dateEnd.val(countDaysOfMonth + '.' + value);
        } else if (parentID == 'days') {
            var date = new Date(),
                day = date.getDate(),
                month = date.getMonth() + 1,
                year = date.getFullYear(),
                tomorrow = day + 1;
            switch(value) {
                case 'today':
                    if (day.toString().length == 1) {
                        day = '0' + day.toString();
                    }
                    dateStart.val(day + '.' + month + '.'+ year);
                    break;
                case 'tomorrow':
                    if (tomorrow.toString().length == 1) {
                        tomorrow = '0' + tomorrow.toString();
                    }
                    dateStart.val(tomorrow + '.' + month + '.'+ year);
                    break;
                case 'week':
                    // получаем текущую неделю
                    var weekStartDay = day - date.getDay() + 1;
                    var weekEndDay = day + (7 - date.getDay());
                    if (weekStartDay.toString().length == 1) {
                        weekStartDay = '0' + weekStartDay.toString();
                    }
                    if (weekEndDay.toString().length == 1) {
                        weekEndDay = '0' + weekEndDay.toString();
                    }
                    dateStart.val(weekStartDay + '.' + month + '.'+ year);
                    dateEnd.val(weekEndDay + '.' + month + '.'+ year);
                    break;
                case 'month':
                    // получим количество дней в месяце
                    countDaysOfMonth = new Date().daysInMonth(year, month);
                    dateStart.val('01.' + month + '.'+ year);
                    dateEnd.val(countDaysOfMonth + '.' + month + '.'+ year);
            }
        }
    });

    calendar.on('change', function () {
        var parentID = '#months';
        $(parentID + ' .categories__item').each(function () {
            $(this).removeClass('cat-active');
            $(this).find('input').each(function () {
                $(this).remove();
            })
        });
        $(this).attr("value", $(this).val());
    });

    $('.filter-buttons .reset > a').on('click', function () {
        $('.categories__item').each(function () {
            if ($(this).attr("id") == 'cat-all') {
                $(this).addClass('cat-active');
            } else {
                $(this).removeClass('cat-active');
            }
        });
        $('.categories__item > input').each(function () {
            $(this).remove();
        });

        $('.dates__item').find('input').each(function () {
            $(this).val('');
        });

        $('.first > input').val('');
        $('.third > select').val('');
    });

    $('.filter-buttons .rset > a').on('click', function () {
        $('.categories__item > input').each(function () {
            $(this).remove();
        });

        $('.dates__item').find('input').each(function () {
            $(this).val('');
        });
        $('select').val('');
        $('.timetable-block').slideUp();
    });

    /*$(window).resize(function() {
     console.log($(this).width());
     });*/

    //$('select').selectBox();

    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! - работает при ресайзе, но очень задерживает работу!
    /*$(window).resize(function () {
     var bool = true;

     if (bool) {
     if (window.matchMedia('(max-width: 1000px)').matches &&
     window.matchMedia('(min-width: 757px)').matches) {
     editTopMenu(3);
     bool = true;
     } else {
     $('#top-menu-1 > li').each(function () {
     if ($(this).css('display') == 'none') {
     $(this).css({display: 'list-item'});
     }
     });
     $('.t-more').remove();
     bool = false;
     }
     }

     });*/

    // высчитваем верхнее меню
    if (window.matchMedia('(max-width: 1000px)').matches && window.matchMedia('(min-width: 757px)').matches) {
        // подставляем число пунктов для первого меню, остальные уйдут во второе скрытое меню
        editTopMenu(3);
    }
    /*if (window.matchMedia('(max-width: 1399px)').matches && window.matchMedia('(min-width: 1000px)').matches) {
     editTopMenu(4);
     }*/

    function editTopMenu(countMenuItem) {
        var count = 0;
        var arLI = [];
        var topMenu = '.top-menu';
        $(topMenu + '> li').each(function (index, element) {
            if (index > countMenuItem) {
                arLI[count] = '<li>' + $(element).html() + '</li>';
                count++;
                $(this).css({display: 'none'});
            }
        });
        $(topMenu).append('<li class="t-more"></li>');
        if ($(arLI).length) {
            var newMenu = $('.t-menu');
            newMenu.addClass('top-menu');
            newMenu.attr('id', 'top-menu-2');
            $(arLI).each(function (index, element) {
                newMenu.append(element);
            });
        }

        // подсчитаем высоту панели Bitrix
        var panel = $('#panel');
        var heightPanel = panel.height();

        // выравняем свайпер меню второго уровня с учетом высоты панели Bitrix
        var rightCont = $('.col-right-cont');
        var heightRightCont = parseInt(rightCont.css('top'));
        rightCont.css('top', heightRightCont + heightPanel);

        $('.t-more').on('click', function () {
            var header = $('#header');
            var heightHeader = header.height();
            var menuHead = $('.menu-head');
            var heightMenuHead = menuHead.height();

            heightRightCont = parseInt(rightCont.css('top'));

            if ($(this).hasClass('act')) {
                $(this).removeClass('act');
                header.stop().animate({height: heightHeader - 50}, 400);
                menuHead.stop().animate({height: heightMenuHead - 50}, 400);
                rightCont.stop().animate({top: heightRightCont - 50}, 400);
            } else {
                $(this).addClass('act');
                header.stop().animate({height: heightHeader + 50}, 400);
                menuHead.stop().animate({height: heightMenuHead + 50}, 400);
                rightCont.stop().animate({top: heightRightCont + 50}, 400);
            }
            $('#top-menu-2').slideToggle();
        });
    }

    // вставляем контакты в шапку сайта на мобильной версии сайта
    $('.conts-hidden').append($('.head-1').html());

    var magIcon = $('.magnifier-icon');
    $('.magnifier').on('click', function () {
        if (!magIcon.hasClass('act')) {
            console.log('213213');
            magIcon.addClass('act');
            $('#pull').stop().animate({opacity: '0'}, 400);
            $('.cross').stop().animate({opacity: '1'});
            $('.search-menu').slideDown();
        }
    });

    $('.cross').on('click', function () {
        if (magIcon.hasClass('act')) {
            magIcon.removeClass('act');
            $('#pull').stop().animate({opacity: '1'}, 400);
            $('.cross').stop().animate({opacity: '0'});
            $('.search-menu').slideUp();
        }
    });

    // удаление оповещений по нажатию на крестик (форма обратной связи)
    $('.feedback-mess').on('click', function () {
       $(this).slideUp();
    });

    $('.err').keyup(function () {
        $(this).removeClass('err');
    });

});