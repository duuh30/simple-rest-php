<?php



use Controllers\HomeController;
/**
 * Class Core
 */
class Core
{


    protected $controller;

    protected $action;

    /**
     * Core constructor.
     */
    public function __construct()
    {
        $this->controller = 'HomeController';
        $this->action     ='index';
    }

    /**
     * handle
     */
    public function handle()
    {

            $controller = new HomeController;

            $controller->index();
             return call_user_func_array($this->controller,$this->action);
//           call_user_func_array([new $this->controller(), $this->action], []);
    }

    /**
     * teste
     */
    public function teste()
    {
        echo "test";
    }

}

?>