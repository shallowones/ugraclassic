(function ($) {
    'use strict';

    $(function () {
        var $body = $('body');
        // попап который будет отображаться при клике на событие
        var $popup = $('<div class="event-popup"></div>');
        // событие в календаре
        var $event = $('.events-item_day_event');
        var eventActiveClass = 'events-item_day_active';
        var template = '' +
            '<div class="event-popup__item">' +
            '   <div class="event-popup__time">{{time}}</div>' +
            '   <div class="event-popup-title"><a href="{{link}}" class="event-popup__link">{{title}}</a></div>' +
            '</div>';

        function removePopup () {
            $popup.remove();
            $event.removeClass(eventActiveClass);
        }

        // задаем body position: relative, чтобы попап центрировался относительно него
        $body.css({
            position: 'relative'
        });

        // инициализация swiper
        $('.swiper-container').swiper({
            slidesPerView: 'auto',
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            onSliderMove: removePopup
        });

        // убиваем попап при клике вне его области
        $(this).on("click", function(e) {
            var $target = $(e.target);
            // убиваем попап если клинкули не по нему или не по событию
            if ($target.closest($event).length === 0 && $target.closest($popup).length === 0) {
                removePopup();
            }
        });

        // показываем попап по клику на событие
        $event.click(function (e) {
            var $this = $(this);
            /** @var {Array} events список событий*/
            var events;
            var offset;
            var items = '';

            e.preventDefault();
            if ($this.hasClass(eventActiveClass)) {
                return false;
            }
            // попап может быть только один поэтому удаляем экземпляры в DOM
            $popup.remove();

            $event.removeClass(eventActiveClass);
            $this.addClass(eventActiveClass);

            events = $this.data('events');
            // если это не массив или он пустой, то ничего и не делаем
            if (!$.isArray(events) || !events.length) {
                return false;
            }

            events.forEach(function (event) {
                items += template
                    .replace('{{time}}', event.time)
                    .replace('{{link}}', event.link || '#')
                    .replace('{{title}}', event.title);
            });

            // получаем координаты где отображать попап
            offset = $this.offset();
            offset.top += $this.height() + 1;

            $popup
                .html(items)
                .css(offset)
                .show()
                .appendTo($body);
        });
    });
} (jQuery));