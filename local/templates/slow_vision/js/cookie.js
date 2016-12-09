jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        // CAUTION: Needed to parenthesize options.path and options.domain
        // in the following expressions, otherwise they evaluate to undefined
        // in the packed version for some reason...
        var path = options.path ? '; path=' + (options.path) : '';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};

function setCookie(name, value){
    $.cookie(name, value, {
        expires: 1,
        path: "/",
    });
}
function getCookie(name){
    return $.cookie(name);
}

function changeFont(val){

    var font = {
        small: 16,
        normal: 18,
        big: 20,
    }
    $('html').attr("style", "font-size:"+font[val]+"px" );
    $('.js-size').each(function() {
       if ($(this).data("size") == getCookie("js-size"))
       {
           $(this).addClass('tool__size_active');
       }
    });
    console.log(font[val]);
}

function changeScheme(val){
    $('body').removeClass('color_black color_blue').addClass( "color_"+val );
    $('.js-color').each(function() {
        if ($(this).data("color") == getCookie("js-color"))
        {
            $(this).addClass('tool__color_active');
        }
    });
}

$(function() {
    $('.js-color').on('click', function(event) {
        event.preventDefault();
        var data = ( $(this).attr('data-color') ) ? $(this).attr('data-color') : null;
        setCookie("js-color", data);
        changeScheme( data );
    });

    $('.js-size').on('click', function(event) {
        event.preventDefault();
        var data = ( $(this).attr('data-size') ) ? $(this).attr('data-size') : null;
        setCookie("js-size", data);
        changeFont( data );
    });

    if( getCookie("js-color") != null )
        changeScheme( getCookie("js-color") );

    if( getCookie("js-size") != null )
        changeFont( getCookie("js-size") );

    if( getCookie("js-color") == null )
        $('body').addClass('color_normal');

});