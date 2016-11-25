<?php
class ContactController extends Controller
{
    public function Send($name, $email, $phone, $message){
        //mail("aiddeath@mail.ru", "My Subject", "Line 1\nLine 2\nLine 3");
        //echo 's';
        //if(isset($_POST['a'])) {

//                $arr = array(
//                    success => false,
//                    'name' => $name,
//                    'email' => $email,
//                    'phone' => $phone,
//                    'messages' => $message,
//                    message => array(
//                        Info => 'qwerty'
//                    ));
        $jsonClass = new JSONClass();
        $jsonClass->Success = true;
        $jsonClass->Result = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'messages' => $message
        );
        //$jsonClass->Messages['Info'] = "qwerty";
        //    header("Content-type: text/txt; charset=UTF-8");
        return Controller::JsonResult($jsonClass->ToJson());
    }
}