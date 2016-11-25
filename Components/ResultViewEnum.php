<?php
abstract class ResultViewEnum {
    const JSON_RESULT = 0;
    const ACTION_RESULT = 1;

    public static $enums = array(
        self::JSON_RESULT => "jsonResult",
        self::ACTION_RESULT => "actionResult"
    );

    public static function toString($enum){
        return self::$enums[$enum];
    }
}