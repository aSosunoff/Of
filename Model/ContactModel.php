<?php

include_once ROOT . "/Components/DB.php";

class ContactModel
{
    public static function SetContact($name, $email, $phone, $message){
        $db = DB::GetConnection();

        $result = $db->prepare("INSERT 
                            INTO Contact 
                              (Contact.NAME, Contact.MESSAGE, Contact.EMAIL, Contact.PHONE, Contact.DATE) 
                            VALUES 
                              ('$name', '$message', '$email', $phone, SYSDATE())");
        $result->execute();
        $db = null;
    }
}