<?php
/**
 * Class Core
 */


require_once('Controller.php');

class Core
{


    protected $controller;

    protected $action;

    /**
     * Core constructor.
     */
    public function __construct()
    {
        $this->controller = 'emailcontroller';
        $this->action     = 'sendEmail';
    }


    /**
     * handler
     */
    public function handler()
    {
           call_user_func_array([new $this->controller(), $this->action], []);
    }


}

?>