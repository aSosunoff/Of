$.fn.hide_background = function() {
    var element = this,
        elementHeight = $(this).outerHeight();

    if($(window).scrollTop() < elementHeight){
        element.css({
            'background-color' : 'transparent',
            'border-bottom' : 0
        });
    }

    $(window).scroll(function() {
        if($(this).scrollTop() > elementHeight){
            element.css({
                'background-color' : 'rgba(255, 255, 255, .8)',
                'border-bottom' : '1px solid #ccc'
            });
        }else{
            element.css({
                'background-color' : 'transparent',
                'border-bottom' : 0
            });
        }
    });
};