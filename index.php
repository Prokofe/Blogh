<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

require_once ('components/Router.php');
require_once ('components/Database.php');

define('ROOT', dirname(__FILE__)); //defines absolute path to root folder
define ('INDEX', 'http://localhost/BloghCMS'); //define relative path to root
define ('TEMPL', 'http://localhost/BloghCMS/template/'); //define relative path to template folder
define ('ASSETS', 'http://localhost/BloghCMS/assets/'); //define relative path to template folder


$router = new Router();
$router->run();

