$(function(){

    $( window ).resize(function() {
        var newHeightItems = $(window).height();
        $("section.item").css({height : newHeightItems});
    });

});