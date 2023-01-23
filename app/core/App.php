<?php

class App 
{
    protected $controller = 'Dashboard';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();
        // var_dump($url);
        if(isset($url[0]))
        {
            if(file_exists(CONPATH . $url[0] . '.php'))
            {
                $this->controller = $url[0];
                unset($url[0]);
            }
        }

        require_once CONPATH . $this->controller . '.php';
        $this->controller = new $this->controller;

        if(isset($url[1]))
        {
            if(method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        if(!empty($url))
        {
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if(isset($_GET['url']))
        {
            $url = rtrim($_GET['url'], '/');
            // $url = $_GET['url'];
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = ucfirst($url);
            $url = explode('/', $url);
            return $url;
        }
    }
}