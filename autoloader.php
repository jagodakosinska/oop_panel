<?php 

   function loadClass($class) {
    $path = 'classes/';
    $extension = '.php';
    $className = strtolower($class);
    require_once $path . $className . $extension;
   }
   // function loadModel($class) {
//     $path = $DOCUMENT_ROOT . '/models/';
//     require_once $path . $class .'.php';
//    }
   
//    function loadView($class) {
//     $path = $DOCUMENT_ROOT . '/views/';
//     require_once $path . $class .'.php';}
//    }
//    spl_autoload_register('loadModel');


   spl_autoload_register('loadClass');