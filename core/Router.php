<?php

namespace App\Core;

class Router
{
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    //Requiring list of routes
    public static function load($file) {
        $router = new static;

        require $file;

        return $router;
    }

    //Storing routes to right methods
    public function get($uri, $controller) {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller) {
        $this->routes['POST'][$uri] = $controller;
    }

    //Checking if controller exists and call specific controller method
    public function direct($uri, $requestType) {

        if(array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }

        throw new \Exception('No route defined for this URI');
    }


    //Call specific action from desired controller
    protected function callAction($controller, $action) {

        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if(! method_exists($controller, $action)) {
            throw new \Exception(
                "No {$controller} does not respond to the {$action} action."
            );
        }

        $controller->$action();
    }

}