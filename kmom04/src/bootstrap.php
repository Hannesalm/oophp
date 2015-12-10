<?php
/**
 * Bootstrapping functions, essential and needed for Orange to work together with some common helpers.
 *
 */

/**
 * Default exception handler.
 *
 */
function myExceptionHandler($exception) {
    echo "Orange: Uncaught exception: <p>" . $exception->getMessage() . "</p><pre>" . $exception->getTraceAsString(), "</pre>";
}
set_exception_handler('myExceptionHandler');


/**
 * Autoloader for classes.
 *
 */
function myAutoloader($class) {
    $path1 = Orange_INSTALL_PATH . "/src/{$class}/{$class}.php";
    $path2 = Orange_INSTALL_PATH . "/src/CSource/{$class}.php";
    $path3 = Orange_INSTALL_PATH . "/src/CCalender/{$class}.php";
    $path4 = Orange_INSTALL_PATH . "/src/CDatabase/{$class}.php";

    if(is_file($path1)) {
        include($path1);
    }
    else if(is_file($path2)) {
        include($path2);
    }
    elseif(is_file($path3)) {
        include($path3);
    }
    elseif(is_file($path4)) {
        include($path4);
    }
    else {
        throw new Exception("Classfile '{$path1},{$path2}' does not exists.");
    }
}
spl_autoload_register('myAutoloader');

function dump($array){
    echo "<pre>" . htmlentities(print_r($array, 1)) . "</pre>";
}