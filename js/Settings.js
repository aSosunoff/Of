$(function(){
    //Навигация по Landing Page
    //$(".top_mnu") - это верхняя панель со ссылками.
    //Ссылки вида <a href="#contacts">Контакты</a>
    $(".top_mnu").navigation();

    //http://lokeshdhakar.com/projects/lightbox2/
    lightbox.option({
        'albumLabel': "Фотография %1 из %2",
        'wrapAround': true
    })
});