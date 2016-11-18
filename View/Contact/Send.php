<?php
//mail("aiddeath@mail.ru", "My Subject", "Line 1\nLine 2\nLine 3");

//if(isset($_POST['a'])) {
$arr = array(
    success => true,
    'a' => 1,
    'b' => 2,
    'c' => 3,
    'd' => 4,
    'e' => 5);

$r = (object)$_POST;
//    header("Content-type: text/txt; charset=UTF-8");
echo json_encode($r);
//}