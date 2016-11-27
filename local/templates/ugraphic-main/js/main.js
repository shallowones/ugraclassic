$( document ).ready( function() {
    // календарь фильтра
    var calendar = $('.dates__item > input');
    calendar.on('click', function () {
        BX.calendar({
            node: this,
            field: this,
            bTime: false
        });
    });

    Date.prototype.daysInMonth = function(year, month) {
        return (new Date(year, month, 0)).getDate();
    };

    $('.categories__item').on('click', function () {
        var parentID = $(this).parent().attr("id");
        var value = $(this).attr('value');
        if (parentID == 'sections') {
            var input = $('<input/>', {
                'value' : value,
                'type' : 'hidden',
                'name' : parentID
            });
            $('#' + parentID + ' .categories__item').each(function() {
                $(this).removeClass('cat-active');
                $(this).find('input').each(function() {
                    $(this).remove();
                })
            });
            $(this).addClass('cat-active');
            $(this).append(input);
        } else if (parentID == 'months') {
            $('#date_start').val('01.' + value);
            var arDate = value.split('.');
            var countDaysOfMonth = new Date().daysInMonth(arDate[1], arDate[0]);
            $('#date_end').val(countDaysOfMonth + '.' + value);
        }
    });

    calendar.on('change', function () {
        var parentID = '#months';
        $(parentID + ' .categories__item').each(function() {
            $(this).removeClass('cat-active');
            $(this).find('input').each(function() {
                $(this).remove();
            })
        });
        $(this).attr("value", $(this).val());
    });

    $('.filter-buttons .reset > a').on('click', function() {
        $('.categories__item').each(function() {
            if ($(this).attr("id") == 'cat-all') {
                $(this).addClass('cat-active');
            } else {
                $(this).removeClass('cat-active');
            }
        });
        $('.categories__item > input').each(function() {
            $(this).remove();
        });
        $('.dates__item').find('input').each(function () {
            $(this).val('');
        });
    });

});