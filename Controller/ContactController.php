<?php
class ContactController extends Controller
{
    private function _getValue($type, $value){
        $value = $this->_clear($value);

        switch ($type){
            case ContactInputTypeEnum::NAME:
                if(strlen($value) == "0"):
                    return null;
                endif;
                return $value;

                break;
            case ContactInputTypeEnum::MESSAGE:
                $value = wordwrap($value, 70, "\r\n");

                if(strlen($value) == "0"):
                    return null;
                endif;
                return $value;

                break;
            case ContactInputTypeEnum::EMAIL:

                if(!filter_var($value, FILTER_VALIDATE_EMAIL)):
                    return null;
                endif;
                return $value;

                break;
            case ContactInputTypeEnum::PHONE:
                if((strlen($value) == "0") || ((strlen($value) > 0) && (!preg_match("/^[0-9]+$/", $value)))):
                    return null;
                endif;
                return $value;

                break;
        }
    }
    private function _clear($value){
        return stripslashes(
                    htmlspecialchars(
                        strip_tags(
                            trim($value)
                        ), ENT_QUOTES)
                );
    }

    private function _getHtml($name, $message, $email, $phone){
        $dt = date("d.m.Y, H:i:s"); // дата и время
        return "<html>
                    <head>
                      <meta http-equiv='Content-Type' content='text/html' charset='utf-8'>      
                    </head>
                    <body>
                        <div id='mailsub'>
                            <b>Имя:</b>$name<br>
                            <b>Сообщение:</b>$message<br>
                            <b>E-Mail:</b> <a href='mailto:$email'>$email</a><br>
                            <b>Телефон:</b>$phone<br>
                            <b>Дата и Время:</b>$dt                    
                        </div>
                    </body>
                </html>";
    }
    // http://www.net-f.ru/item/php/55.html
    public function Send($name, $email, $phone, $message){
        $eEn = null;

        $name = $this->_getValue(ContactInputTypeEnum::NAME, $name);
        $eEn .= $name == null ? "Заполните поле 'Имя'<br>" : null;

        $message = $this->_getValue(ContactInputTypeEnum::MESSAGE, $message);
        $eEn .= $message == null ? "Заполните поле 'Сообщения'<br>" : null;

        $email = $this->_getValue(ContactInputTypeEnum::EMAIL, $email);
        $eEn .= $email == null ? "Неверное значение 'E-mail'<br>" : null;

        $phone = $this->_getValue(ContactInputTypeEnum::PHONE, $phone);
        $eEn .= $phone == null ? "Заполните поле 'Контактный телефон'<br>" : null;


        $jsonClass = new JSONClass();

        if($eEn != null){
            $jsonClass->Success = false;
            $jsonClass->Messages['Info'] = $eEn;
        }else{

            $mail = "aiddeath@mail.ru"; // e-mail куда уйдет письмо
            $title = "Новое сообщение"; // заголовок(тема) письма
            //конвертируем
            //$title = iconv("utf-8","windows-1251", $title);
            //$title = convert_cyr_string($title, "w", "k");

            $message = str_replace("\r\n", "<br>", $message); // обрабатываем

            //$mess="<html><head></head><body><b>Имя:</b> $name<br>";
            //$mess.="<b>Сообщение:</b> $message<br>";
            // ссылка на e-mail
            //$mess.="<b>E-Mail:</b> <a href='mailto:$email'>$email</a><br>";
            //$mess.="<b>Телефон:</b> $phone<br>";
            //$mess.="<b>Дата и Время:</b> $dt</body></html>";
            //конвертируем
            $mess = $this->_getHtml($name, $message, $email, $phone);
            //$mess = iconv("utf-8","windows-1251", $this->_getHtml($name, $message, $email, $phone));
            //$mess = convert_cyr_string($mess, "w", "k");

            $headers="MIME-Version: 1.0\r\n";
            $headers.="Content-Type: text/html; charset=koi8-r\r\n";
            $headers.="From: $email\r\n"; // откуда письмо
            mail($mail, $title, $mess, $headers); // отправляем
            //mail("aiddeath@mail.ru", "My Subject", $message);
            $jsonClass->Success = true;
            $jsonClass->Messages['Success'] = "<p>Сообщение отправлено.</p><p>Мы скоро Вам перезвоним!</p>";
        }




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



//        $jsonClass->Result = array(
//            'name' => $name,
//            'email' => $email,
//            'phone' => $phone,
//            'messages' => $message
//        );

        //    header("Content-type: text/txt; charset=UTF-8");
        return Controller::JsonResult($jsonClass->ToJson());
    }
}