<?php
/**
 * Created by PhpStorm.
 * User: Duh
 * Date: 23/10/2018
 * Time: 21:31
 */

use config\Router;



$app = new Router();

$app->route('POST' , '/hello' , function (){

});

$app->route('GET','/ola', function(){
   echo ('Enois');
});

$app->route('POST','/lek', function(){
    echo ("DELE");
});

$app->run();