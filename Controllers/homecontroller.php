<?php

/**
 * Class homeController
 */

class HomeController extends Controller
{


    private $request;
    /**
     * homeController constructor.
     */
    public function __construct()
    {
        $this->request = $this->getRequest();
    }

    /**
     * index
     */
    public function index()
    {
        return $this->response_json($this->getRequest());

    }

}