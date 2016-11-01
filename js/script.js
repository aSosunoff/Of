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

;(function(win, $){
    win.sty = function(selector){

        return (function(z){
            return{
                cssS: function(st){
                    $(z).focus(function(){
                        $(this).css(st);
                    });
                }
            }
        })(selector)
    };
})(this, jQuery);

sty("#name").cssS({border: "1px solid #000"});

sty("#email").cssS({border: "2px solid #ddd"});
// var createHelloFunction = function(name) {
//     return function() {
//         return 'Hello, ' + name;
//     }
// }
// var sayHelloHabrahabr = createHelloFunction('Habrahabr');
// var t = sayHelloHabrahabr();
//
// var sayHelloHabrahabr2 = createHelloFunction('Habrahabr2');
// var y = sayHelloHabrahabr2();

// function createCounter() {
//     var numberOfCalls = 0;
//     return function() {
//         return ++numberOfCalls;
//     }
// }
//
// var fn = createCounter();
// fn(); //1
// fn(); //2
// fn(); //3
