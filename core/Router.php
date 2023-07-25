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
    }
}