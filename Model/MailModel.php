<?php

class MailModel
{
    public static function SetHtmlFromContact($html){
        try {
            $db = DB::GetConnection();
            $html = preg_replace("/'/", "\'", $html);

            $result = $db->prepare("INSERT 
                            INTO Mail 
                              (Mail.HTML, Mail.ID_Form) 
                            VALUES 
                              ('$html', 1)");
            $result->execute();

            $db = null;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}