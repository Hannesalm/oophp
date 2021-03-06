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
    $path1 = Orange_INSTALL_PATH . "/src/CSource/{$class}.php";
    $path2 = Orange_INSTALL_PATH . "/src/CCalender/{$class}.php";

    if(is_file($path1)) {
        include($path1);
    }
    elseif(is_file($path2)) {
        include($path2);
    }
    else {
        throw new Exception("Classfile '{$path1},{$path2}' does not exists.");
    }
}
spl_autoload_register('myAutoloader');