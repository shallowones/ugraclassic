$(function () {
   $('.js_preset_week').on('click', function () {

       var preset     = $(this).data('preset'),
           dateStart  = $('#date_start'),
           dateEnd    = $('#date_end');

       $.get(
           "/local/templates/ugraphic-main/components/bitrix/news/events-complex/ajax.preset.php",
           {
               'preset': preset
           },
           function(data){
               var string = JSON.parse(data);

               dateStart.val(string.dateStart);
               dateEnd.val(string.dateEnd);
           }
       );

   });
});