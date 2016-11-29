<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 29.11.2016
 * Time: 21:11
 */
abstract class ContactInputTypeEnum
{
    const NAME = 0;
    const EMAIL = 1;
    const PHONE = 2;
    const MESSAGE = 3;

    public static $enums = array(
        self::NAME => "name",
        self::EMAIL => "email",
        self::PHONE => "phone",
        self::MESSAGE => "message"
    );

    public static function toString($enum){
        return self::$enums[$enum];
    }
}