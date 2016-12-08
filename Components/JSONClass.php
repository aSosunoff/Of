<?php

class JSONClass
{
//    private $Success;
//    private $Info;
//    private $Error;

    public $Messages = array(
        'Success' => "",
        'Info' => "",
        'Error' => ""
    );

    /// <summary>
    /// Флаг пришли ли данные или нет.
    /// </summary>
    public $Success = false;

    /// <summary>
    /// Вывод сообщения об ошибках(На стороне клиента используется для консольки)
    /// </summary>
    public $ConsoleMessage;

    public $Result;

    public function ToJson()
    {
        return json_encode(
            array(
                'success' => $this->Success,
                'message' => $this->Messages,
                'consoleMessage' => $this->ConsoleMessage,
                'result' => $this->Result
            )
        );
    }
}