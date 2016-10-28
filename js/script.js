$(function(){
    // Resize height block item
    // $("section.item").css({'min-height' : $(window).height()});
    // $( window ).resize(function() {
    //    var newHeightItems = $(window).height();
    //    $("section.item").css({'min-height' : newHeightItems});
    // });

    // Up scroll
    $("#Scroll-up-backgroung").click(function(){
        $("html, body").stop().animate({
            scrollTop: 0
        }, 800);
    });

    // Hide color background top menu
    if($(window).scrollTop() < $("#top_header").outerHeight()){
        $("#top_header").addClass("hide-color");
    }
    $(window).scroll(function() {
        if($(this).scrollTop() > $("#top_header").outerHeight()){
            $("#top_header").removeClass("hide-color");
        }else{
            $("#top_header").addClass("hide-color");
        }
    });

    // Change height top menu
    $(window).scroll(function() {
        if($(this).scrollTop() > $("#Project").outerHeight()){
            $("#top_header").addClass("small-height");
            $("#Scroll-up-box").addClass("show-button-scroll");
        }else{
            $("#top_header").removeClass("small-height");
            $("#Scroll-up-box").removeClass("show-button-scroll");
        }
    });
});