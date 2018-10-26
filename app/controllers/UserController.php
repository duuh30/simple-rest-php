<?php
/**
 * Created by PhpStorm.
 * User: Duh
 * Date: 24/10/2018
 * Time: 01:26
 */

namespace Controll;

use config\Router;
use GuzzleHttp\Client;




class UserController
{
    private $client;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     *
     */
    public function index($id)
    {
        echo 'dale desle';
        exit;
    }

}//end class