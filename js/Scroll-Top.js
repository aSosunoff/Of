//;(function($, win){
//
//})(jQuery, this);
$.fn.scroll_top = function() {
    this.click(function(){
        $("html, body").stop().animate({
            scrollTop: 0
        });
    });
};

$(function(){
    $("#button_up").scroll_top();
});