$(function() {
	var pull 		= $('#pull');
		menu 		= $('nav .top-menu');
		menuHeight	= menu.height();

	$(pull).on('click', function(e) {
		e.preventDefault();
		var contsHidden = $('.conts-hidden');
		console.log(contsHidden.css('display'));
		if (contsHidden.css('display') == 'none') {
            contsHidden.slideDown();
            $(this).stop().animate({opacity: 1}, 400, function () {
                menu.slideDown();
            });
		} else {
            menu.slideUp();
            $(this).stop().animate({opacity: 1}, 400, function () {
                contsHidden.slideUp();
            });
		}

		var navIcon = $('.nav-icon');
		if (navIcon.hasClass('act')) {
            navIcon.removeClass('act');
		} else {
            navIcon.addClass('act');
		}
	});

	$(window).resize(function(){
		var w = $(window).width();
		if(w > 750 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}
	});

	$('.top-menu li a').on('click', function() {
		if ($(this).siblings("ul.falls").is(":hidden")){
			event.preventDefault();
			$(this).siblings("ul.falls").show();
		}
	  	
	});
});