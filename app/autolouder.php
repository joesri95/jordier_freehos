<?php

function autoloadModel($className) {
    $filename = "app/models/" . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}
function autoloadetc($className){
    $filename = "app/etc/" . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
    
}

function autoloadController($className) {
    $filename = "app/controllers/" . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}
class Autoloader {
    
    public static function run(){
      spl_autoload_register("autoloadetc");
      spl_autoload_register("autoloadModel");
      spl_autoload_register("autoloadController");
    }
}

?>