<?php 

   function loadClass($class) {
    $path = 'classes/';
    $extension = '.php';
    $className = strtolower($class);
    $filename = $path . $className . $extension;
    if(!file_exists($filename)){
        return false;
    }
    require_once $filename;
}


   spl_autoload_register('loadClass');