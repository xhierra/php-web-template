<?php
require_once('path_controller.php');

spl_autoload_register(function ($class) {
    require_once __DIR__ . '/../class/' .$class. '.php';

    
/**
 * you can add other libraries here just do
 * 
 *    if(file_exists(LIBRARYPATH)):
 *        require_once LIBRARYPATH;
 *    endif;
 * 
 */

});


