<?php

require __DIR__ . "./Boot/Config.php";
require __DIR__ . "./Boot/Helpers.php";

spl_autoload_register(function ($class) {
    $prefix = "Source\\";
    $baseDir = __DIR__ . "/";
    $baseDir = str_replace("\\", "/", $baseDir);
    $len = strlen($prefix);
    
    if(strncmp($prefix, $class, $len) !== 0)
    {
        return;
    }
    
    $relativeClass = substr($class, $len);
    
    $file = $baseDir . str_replace("\\", "/", $relativeClass) . ".php";
    
    if(file_exists($file))
    {
        require $file;
    }
});

