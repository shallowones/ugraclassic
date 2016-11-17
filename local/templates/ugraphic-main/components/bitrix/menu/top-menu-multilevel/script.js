$(function() {
	var pull 		= $('#pull');
		menu 		= $('nav #top-menu');
		menuHeight	= menu.height();

	$(pull).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});

	$(window).resize(function(){
		var w = $(window).width();
		if(w > 750 && menu.is(':hidden')) {
			menu.removeAttr('style');
		};
	});

	$('#top-menu li a').click(function() {
		if ($(this).siblings("ul.falls").is(":hidden")){
			event.preventDefault();
			$(this).siblings("ul.falls").show();
		}
	  	
	});
});