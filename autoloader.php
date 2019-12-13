<?php

function loadController($class)
{
    $path = 'Controller/';
    $extension = '.php';
    // $className = strtolower($class);
    // $filename = $path . $className . $extension;
    $filename = $path . $class . $extension;
    if (!file_exists($filename)) {
        return false;
    }
    require_once $filename;
}

function loadModel($class)
{
    $path = 'Model/';
    $extension = '.php';
    // $className = strtolower($class);
    // $filename = $path . $className . $extension;
    $filename = $path . $class . $extension;
    if (!file_exists($filename)) {
        return false;
    }
    require_once $filename;
}

spl_autoload_register('loadController');
spl_autoload_register('loadModel');
