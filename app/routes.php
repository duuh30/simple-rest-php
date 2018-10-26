<?php
/**
 * Created by PhpStorm.
 * User: Duh
 * Date: 23/10/2018
 * Time: 21:31
 */

use config\Router;
use Controll\UserController;
$app = new Router();



$app->route('/hello', function (){
    echo "Hello";
    call_user_func("Controllers\UserController::index");
});

$app->route('/ola', function(){
   echo ('Enois');
});

$app->route('/lek', function(){
    echo ("DELE");
});



$app->run();





