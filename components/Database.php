<?php

/**
 * Class Database
 * Component for work with DB
 */

Class Database
{

    /**
     * Establish connection with DB
     * @return PDO
     */
    public static function getConnection()
    {
        $paramsPath = './config/db_config.php';
        $params = include($paramsPath);


        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO ($dsn, $params['user'], $params['password']);

        return $db;
    }
}
