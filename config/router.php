<?php
/**
 * Created by PhpStorm.
 * User: Duh
 * Date: 23/10/2018
 * Time: 21:29
 */


namespace config;

use Controllers\UserController;

class Router
{
    private $config = [];
    private $uri;
//    private $method;
    
    /**
     * Router constructor.
     */
    public function __construct()
    {
        // Pega a uri requisitada
        if (isset($_SERVER['REQUEST_URI'])) {
            $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $this->uri = $uri;
        }


        // Pega verbo HTTP Requisitado
//        if(isset($_SERVER["REQUEST_METHOD"])) {
//            $method = $_SERVER["REQUEST_METHOD"];
//            $this->method = $method;
//        }


    }//end __construct()

    /**
     * Esse método Route vai receber o Verbo HTTP, a Rota de requisição e o Callback
     * @param $method
     * @param $route
     * @param $callback
     */
    public function route($route, $callback)
    {
        $this->config[] = [$route => $callback];
    }



    /**
     * @return mixed
     */
    public function run()
    {
        foreach ($this->config as $routes){
            if(array_key_exists($this->uri, $routes)) {
                    if (is_callable($routes[$this->uri])) {
                        return $routes[$this->uri]();
                    }//end second if
            }//end first if
        }//end foreach



        $error = [
            "msg" => "Rota não foi encontrada, verifique seu verbo de requisição e a uri de requisição",
            "status_error" => true
        ];

        http_response_code(404);
        echo json_encode($error);
        exit;

    }//end function run





}