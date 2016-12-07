<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Бизнес проект "Размах"</title>
    <!--<meta name="description" content="Создание адаптивного сайта" />-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--<link rel="shortcut icon" href="favicon.png" />-->
    <link rel="stylesheet" href="/library/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/library/bootstrap/Redefinition.css"/>
    <link rel="stylesheet" href="/library/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/library/owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="/library/font-awesome-4.6.3/css/font-awesome.min.css">
    <!--http://lokeshdhakar.com/projects/lightbox2/-->
    <link rel="stylesheet" href="/library/lightbox2-master/css/lightbox.css">
    <link rel="stylesheet" href="/library/lightbox2-master/Redefinition.css">

    <link rel="stylesheet" href="/style/fonts.css">

    <link rel="stylesheet" href="/style/scroll-up/scroll_up.css">
    <link rel="stylesheet" href="/style/scroll-up/media-scroll-up.css">
    <link rel="stylesheet" href="/style/people/people.css">
    <link rel="stylesheet" href="/style/people/media-people.css">
    <link rel="stylesheet" href="/style/events-line/events-line.css">
    <link rel="stylesheet" href="/style/events-line/media-events-line.css">

    <link rel="stylesheet" href="/style/section.css"/>
    <link rel="stylesheet" href="/style/style.css"/>
    <link rel="stylesheet" href="/style/media.css">
</head>
<body>
<div class="wrapper">
    <div class="content">
        <div id="Scroll-up-box">
            <div id="Scroll-up-backgroung">
                <div id="Scroll-up-button">
                    <span id="Scroll-up-button-text">Наверх</span>
                    <i class="fa fa-arrow-circle-up" aria-hidden="true" id="Scroll-up-button-icon"></i>
                </div>
            </div>
        </div>

        <header id="top_header">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="row">
                        <ul class="nav nav-pills nav-justified top_mnu nav-pills-custom">
                            <li>
                                <a href="#Project" title="Проект">
                                    <span class="icon-menu-item">
                                        <i class="fa fa-university" aria-hidden="true"></i>
                                    </span>
                                    <span class="title-menu-item">Проект</span>
                                </a>
                            </li>
                            <li>
                                <a href="#Information" title="Информация">
                                    <span class="icon-menu-item">
                                        <i class="fa fa-info" aria-hidden="true"></i>
                                    </span>
                                    <span class="title-menu-item">Информация</span>
                                </a>
                            </li>
                            <li>
                                <a href="#Solution" title="Решение">
                                    <span class="icon-menu-item">
                                        <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                                    </span>
                                    <span class="title-menu-item">Решение</span>
                                </a>
                            </li>
                            <li>
                                <a href="#Target" title="Цели">
                                    <span class="icon-menu-item">
                                        <i class="fa fa-crosshairs" aria-hidden="true"></i>
                                    </span>
                                    <span class="title-menu-item">Цели</span>
                                </a>
                            </li>
                            <li>
                                <a href="#People" title="Люди">
                                    <span class="icon-menu-item">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                    </span>
                                    <span class="title-menu-item">Люди</span>
                                </a>
                            </li>
                            <li>
                                <a href="#Map" title="Карта">
                                    <span class="icon-menu-item">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    </span>
                                    <span class="title-menu-item">Карта</span>
                                </a>
                            </li>
                            <li>
                                <a href="#Contacts" title="Контакты">
                                    <span class="icon-menu-item">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </span>
                                    <span class="title-menu-item">Контакты</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <?php
            if(file_exists(RENDER_BODY)){
                include_once(RENDER_BODY);
            }
        ?>
    </div>
    <div class="footer">
        <footer class="footer_info">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <ul class="nav nav-pills nav-stacked link-help">
                            <li><a href="#">О проекте</a></li>
                            <li><a href="#">Часто задаваемые вопросы?</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <ul class="nav nav-pills pull-right social-button">
                            <li><a href="https://vk.com/" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
                            <li><a href="https://instagram.com/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="https://facebook.com/" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                            <li><a href="https://ok.ru/" target="_blank"><i class="fa fa-odnoklassniki" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <footer class="footer_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <span>2016&#169; - Все права защищены</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="/library/jquery/jquery.js" type="text/javascript"></script>
<script src="/library/bootstrap/js/bootstrap.js" type="text/javascript"></script>
<script src="/library/owl-carousel/owl.carousel.js" type="text/javascript"></script>
<script src="/library/landing-nav/navigation.js" type="text/javascript"></script>
<!--http://lokeshdhakar.com/projects/lightbox2/-->
<script src="/library/lightbox2-master/js/lightbox.js"></script>
<script src="/library/jquery/inputmask/inputmask.js"></script>
<script src="/library/jquery/inputmask/inputmask.phone.extensions.js"></script>
<script src="/library/jquery/inputmask/jquery.inputmask.js"></script>


<script src="/js/Component/Message.js" type="text/javascript"></script>
<script src="/js/Component/AJAXGlobal.js" type="text/javascript"></script>

<script src="/js/Settings.js" type="text/javascript"></script>
<script src="/js/contact.js" type="text/javascript"></script>
<script src="/js/script.js" type="text/javascript"></script>
<!-- Yandex.Metrika counter -->
<!-- Google Analytics counter -->
</body>
</html>