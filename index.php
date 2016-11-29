<?php

//  FRONT CONTROLLER

//  1. Общие настройки

if(!ini_get('display_errors')){
    ini_set('display_errors', 1);
    // установка значения заданной настройки конфигурации
    // говорим о том что бы ошибки выводились на экран вместе с остальным выводом
    error_reporting(E_ALL);
    // выводим все ошибки
}

//  2. Подключение файлов системы

// определяем именованную константу в которой путь корня сайта
define('ROOT', dirname(__FILE__));

define('MASTER_PAGE', ROOT . '/View/Layout/Master.php');
//определяем мастер страницу
require_once(ROOT . '/Components/enum/ResultViewEnum.php');
require_once(ROOT . '/Components/enum/ContactInputTypeEnum.php');
require_once(ROOT . '/Components/Router.php');
require_once(ROOT . '/Components/JSONClass.php');
require_once(ROOT . '/Controller/Controller.php');

//require_once(ROOT.'/component/DB.php');
//require_once(ROOT . '/component/Link.php');

//  3. Установка соединения с БД

//  4. Вызов Router

$router = new Router();
$router->Run();
