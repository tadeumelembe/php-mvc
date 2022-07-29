<?php

namespace App\Core;

class App
{

    protected $controller = 'Products';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        if (file_exists('../app/controllers/' . ucfirst($url[0]) . '.php')) {
           $this->controller = ucfirst($url[0]);
           unset($url[0]);
        }else if(count($url)==1){
            $url[1] = $url[0];
        }

        //require_once '../app/controllers/'. $this->controller .'.php';

        $class = "App\Controller\\" .  $this->controller;
        
        $this->controller = new $class;

        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

         call_user_func_array([$this->controller, $this->method], $this->params);
        
    }

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
          return explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}