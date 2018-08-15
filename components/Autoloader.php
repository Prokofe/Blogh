<?php

//register our autoloader as __autoload() implementation
spl_autoload_register('autoloader');

/**
 * autoload classes or components if found
 * @param $class_name
 */
function autoloader($class_name) {

    $array_paths = [
        '/models/',
        '/components/',
        '/controllers/',
    ];

    foreach ($array_paths as $path) {

        $path = ROOT . $path . $class_name . '.php';

        if (is_file($path)) {
            include_once $path;
        }
    }
}

