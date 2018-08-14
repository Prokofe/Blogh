<?php

//set display_errors for debug
ini_set('display_errors', 1);
error_reporting(E_ALL);


//start session for 1 time
session_start();


//defines absolute path to root folder
define('ROOT', dirname(__FILE__));


//include autoloader and configs
require_once (ROOT . '/config/app_config.php');
require_once (ROOT . '/components/Autoloader.php');


//start Router
$router = new Router();
$router->run();

