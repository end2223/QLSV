<?php
//tu dong goi den class
spl_autoload_register(function($className){
    $exp = str_replace('_', '\\', $className);
    $path = str_replace("lib", "", dirname(__FILE__));//link den foder hien tai
//    var_dump($path);die();
    include_once $path.$exp.'.php';
}); 