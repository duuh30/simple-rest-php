<?php

require_once('vendor/autoload.php');



 spl_autoload_register(function ($class) {
    if (strpos($class, 'controller') > -1) {

        if (file_exists('Controllers/' . $class . '.php')) {
            require_once('Controllers/' . $class . '.php');

//            require_once ('Controllers/' . $class . '.php');
        }
    } else {
            require_once ('Core/' . $class . '.php');
//        require_once 'Core/' . $class . '.php';
    }
});


$core = new Core();
$core->handler();