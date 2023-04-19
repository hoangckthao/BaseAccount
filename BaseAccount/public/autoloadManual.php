<?php 
    spl_autoload_register(function ($class) {
        $path = dirname(__DIR__);
        $extension = '.php';
        $fullpath = $path.'\\'. $class.$extension;
        
        $fullpath = str_replace('\\app\\', '\\',$fullpath);
        $fullpath = str_replace('\\', '/', $fullpath);
        include_once $fullpath;
    })
?>
