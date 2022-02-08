<?php

set_include_path(PATH_APPLICATION);
$autoloader = function($className) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    include $path;
};

spl_autoload_register($autoloader);