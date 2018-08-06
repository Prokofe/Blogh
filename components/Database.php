<?php

Class Database
{

    public static function getConnection()
    {
        $paramsPath = './config/db_config.php';
        $params = include($paramsPath);


        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO ($dsn, $params['user'], $params['password']);

        return $db;
    }
}
