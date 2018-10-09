<?php

spl_autoload_register(function ( $class ) {

    $parts = explode('\\', $class);
    $root  = __DIR__ . DIRECTORY_SEPARATOR;

    if('Test' === $parts[0]) {

        $root = dirname(__DIR__) . DIRECTORY_SEPARATOR;
        array_shift($parts);
    }

    $path = $root . DIRECTORY_SEPARATOR .
            implode(DIRECTORY_SEPARATOR, $parts) . '.php';

    if(false === file_exists($path))
        return false;

    require_once $path;

    return true;
});
