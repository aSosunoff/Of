$(function(){
    //Навигация по Landing Page
    //$(".top_mnu") - это верхняя панель со ссылками.
    //Ссылки вида <a href="#contacts">Контакты</a>
    $(".top_mnu").navigation();

    $("#top_header").hide_background();

    $("#button_up").click(function(){
        $("html, body").stop().animate({
            scrollTop: 0
        }, 800);
    });
});