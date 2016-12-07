<?php

class Controller
{
    protected static function AtionResult($data){
        return array(
            'result' => ResultViewEnum::ACTION_RESULT,
            'data' => $data
        );
    }
    protected static function JsonResult($data){
        return array(
            'result' => ResultViewEnum::JSON_RESULT,
            'data' => $data
        );
    }
}