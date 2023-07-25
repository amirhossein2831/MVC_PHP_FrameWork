<?php

namespace App\core;

use App\Component\Interface\RouterMethod;

class Router implements RouterMethod
{
    protected array $routes;
    private Request $request;

    public function __construct(Request $request){
        $this->request = $request;
        $this->routes = [];
    }

    public function get($path,$callback): void
    {
        $this->routes ['GET'][$path] = $callback;
    }

    public function post($path, $callback): void
    {
        $this->routes ['POST'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if (!$callback) {
            echo "NOT FOUND";
            exit;
        }
        echo call_user_func($callback);
    }
}