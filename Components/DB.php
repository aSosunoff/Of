<?php

class DB
{
    public static function GetConnection(){
        $params = include ROOT.'/Config/db_params.php';
        $connection = new PDO("mysql:host={$params['host']};dbname={$params['db_name']}", $params['user'], $params['password'] );
        return $connection;
    }
}