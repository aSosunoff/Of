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

    private function _getEmailHead($info){
        return "
        <!DOCTYPE html>
        <html xmlns=\"http://www.w3.org/1999/xhtml\">
        <head>
          <meta http-equiv='Content-Type' content='text/html' charset=\"utf-8\"> <!-- utf-8 works for most cases -->
          <meta name=\"viewport\" content=\"width=device-width\"> <!-- Forcing initial-scale shouldn't be necessary -->
          <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"> <!-- Use the latest (edge) version of IE rendering engine -->
          <meta name=\"x-apple-disable-message-reformatting\">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
          <title>Письмо из контактов</title> <!-- The title tag shows in email notifications, like Android 4.4. -->
        </head>
        <body width=\"100%\" bgcolor=\"#d4d4d4\"
              style=\"
                margin: 0;
                mso-line-height-rule: exactly;
                padding: 0px 10px;
                box-sizing: border-box;\">
          <!-- Visually Hidden Preheader Text : BEGIN -->
          <div style=\"display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;\">
            (Optional) This text will appear in the inbox preview, but not the email body.
          </div>
          <!-- Visually Hidden Preheader Text : END -->
        
          <!-- Clear Spacer : BEGIN -->
          <table role=\"presentation\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"600\" style=\"margin: auto;\" class=\"email-container\">
            <tr>
              <td style=\"
                font-size: 0;
                line-height: 0;
                height: 20px;\">
              </td>
            </tr>
          </table>
          <!-- Clear Spacer : END -->
        
          <!-- Email Header : BEGIN -->
          <table role=\"presentation\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"600\" style=\"margin: auto;\" class=\"email-container\">
            <tr>
              <td style=\"
              text-align: center;
              font-family: impact;
              font-size: 60px;
              background-color: #A9D52B;
              color: #fff;\">
                <a href=\"#\"
                  style=\"
                    padding: 10px 0;
                    text-decoration: none;
                    color: inherit;
                    width: 100%;
                    height: 100%;
                    display: block;\">
                  Размах</a>
              </td>
            </tr>
          </table>
          <!-- Email Header : END -->
        
          <!-- Email Info : BEGIN -->
          <table role=\"presentation\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"600\" style=\"margin: auto;\" class=\"email-container\">
            <tr>
              <td bgcolor=\"#ffffff\"
                  style=\"
                    padding: 5px;
                    text-align: center;
                    font-family: verdana;
                    font-size: 90%;
                    background-color: #6f7ae4;
                    line-height: 1.5em;
                    letter-spacing: 1px;
                    color: #ffffff;\">
                $info
              </td>
            </tr>
          </table>
          <!-- Email Info : END -->";
    }

    private function _getEmailFooter(){
        return "
          <!-- Email Footer : BEGIN -->
          <table role=\"presentation\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"600\" style=\"margin: auto;\" class=\"email-container\">
            <tr>
              <td colspan=\"2\"
                style=\"
                  width: 100%;
                  line-height: 10px;
                  text-align: center;
                  color: #888888;\">
              <a href=\"#\"
                style=\"
                  padding: 10px 0;
                  text-decoration: none;
                  color: inherit;
                  display: block;
                  width: 100%;
                  font-size: 80%;
                  height: 100%;
                  font-family: 'Time New Roman';\">
              Размах</a>
              </td>
            </tr>
          </table>
          <div style=\"
                padding: 0px 0px 10px 0px;
                margin: 0 auto;
                width: 600px;\">
            <table role=\"presentation\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\"
                   style=\"
              width: 100%;\">
              <tr
                style=\"
                  font-family: 'Time New Roman';
                  color: #888888;
                  font-size: 80%;\">
                <td
                  style=\"
                    text-align: right;
                    width: 30%;
                    padding: 5px 10px;\">
                  г.Муром</td>
                <td>Владимирская обл., г. Муром, ул. Воровского, д. 86, ФК \"Солнечный\"</td>
              </tr>
              <tr
                style=\"
                  font-family: 'Time New Roman';
                  color: #888888;
                  font-size: 80%;\">
                <td
                  style=\"
                    text-align: right;
                    width: 30%;
                    padding: 5px 10px;\">
                  г.Нижний Новгород</td>
                <td>Нижегородская обл., г. Н.Новгород, ул. Академика Сахарова, д. 113</td>
              </tr>
              <tr
                style=\"
                  font-family: 'Time New Roman';
                  color: #888888;
                  font-size: 80%;\">
                <td
                  style=\"
                    text-align: right;
                    width: 30%;
                    padding: 5px 10px;\">
                  г.Навашино</td>
                <td>Нижегородская обл., г. Навашино, ул. Калинина, д. 5, ТЦ \"Визит\"</td>
              </tr>
              <tr
                style=\"
                  font-family: 'Time New Roman';
                  color: #888888;
                  font-size: 80%;\">
                <td
                  style=\"
                    text-align: right;
                    width: 30%;
                    padding: 5px 10px;\">
                  г. Выкса</td>
                <td>Нижегородская обл., г. Выкса, ул. Красные Зори, д. 30, 4 этаж</td>
              </tr>
              <tr
                style=\"
                  font-family: 'Time New Roman';
                  color: #888888;
                  font-size: 80%;\">
                <td
                  style=\"
                    text-align: right;
                    width: 30%;
                    padding: 5px 10px;\">
                  г. Владимир</td>
                <td>Владимирская обл., г. Владимир, ул. Чайковского, д. 21А, 1 Этаж, офис 7</td>
              </tr>
              <tr
                style=\"
                  font-family: 'Time New Roman';
                  color: #888888;
                  font-size: 80%;\">
                <td
                  style=\"
                    text-align: right;
                    width: 30%;
                    padding: 5px 10px;\">
                  г. Судогда</td>
                <td>Владимирская обл., г. Судогда, ул. Ленина, д. 26</td>
              </tr>
            </table>
          </div>
          <!-- Email Footer : END -->
        
        </body>
        </html>";
    }

    private function _getHtmlContact($name, $message, $email, $phone){
        $dt = date("d.m.Y, H:i:s"); // дата и время

        preg_match("/^(\\d{3})(\\d{3})(\\d{2})(\\d{2})$/", $phone, $matches);
        $phone = "8 (" . $matches[1] . ") " . $matches[2] . "-" . $matches[3] . "-" . $matches[4];

        $emailBody = "     
          <!-- Email Body : BEGIN -->
          <div style=\"
                padding: 20px 0px;  
                margin: 0 auto;
                width: 600px;
                background-color: #fff;\">
            <table role=\"presentation\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" class=\"email-container\"
                   style=\"
                     font-family: \"verdana\";
                     width: 100%;\">
              <tr>
                <td style=\"
                    padding: 10px;
                    text-align: right;
                    width: 30%;
                    font-size: 70%;
                    color: #929292;\">
                  Имя:</td>
                <td style=\"
                    padding: 10px;
                    font-family: 'Time New Roman';
                    color: #383838;\">
                  $name</td>
              </tr>
              <tr>
                <td style=\"
                    padding: 10px;
                    text-align: right;
                    width: 30%;
                    font-size: 70%;
                    color: #929292;\">
                  Сообщение:</td>
                <td style=\"
                    padding: 10px;
                    font-family: 'Time New Roman';
                    color: #383838;\">
                  $message</td>
              </tr>
              <tr>
                <td style=\"
                    padding: 10px;
                    text-align: right;
                    width: 30%;
                    font-size: 70%;
                    color: #929292;\">
                  Email:</td>
                <td style=\"
                    padding: 10px;
                    font-family: 'Time New Roman';
                    color: #383838;\">
                  $email</td>
              </tr>
              <tr>
                <td style=\"
                    padding: 10px;
                    text-align: right;
                    width: 30%;
                    font-size: 70%;
                    color: #929292;\">
                  Телефон:</td>
                <td style=\"
                    padding: 10px;
                    font-family: 'Time New Roman';
                    color: #383838;\">
                  $phone</td>
              </tr>
              <tr>
                <td style=\"
                    padding: 10px;
                    text-align: right;
                    width: 30%;
                    font-size: 70%;
                    color: #929292;\">
                  Дата и Время отправления:</td >
                <td style = \"
                    padding: 10px;
                    font-family: 'Time New Roman';
                    color: #383838;\" >
                  $dt</td >
              </tr >
            </table>
          </div>
          <!-- Email Body : END -->";

        return
            $this->_getEmailHead("Данное сообщение прислано пользователем из контактов")
            . $emailBody
            . $this->_getEmailFooter();
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
            $title = "Новое сообщение из конатактов"; // заголовок(тема) письма
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
            $mess = $this->_getHtmlContact($name, $message, $email, $phone);
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