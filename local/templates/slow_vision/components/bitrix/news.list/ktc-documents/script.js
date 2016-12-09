$(function () {
   $('.categories__item').on('click', function () {
       var url = window.location.href;
       var arUrl = url.split('?');
       window.location.href = arUrl[0]+'?YEAR='+$(this).children().val();
   });
});