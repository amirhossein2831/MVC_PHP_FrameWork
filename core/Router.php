<?php

namespace App\core;

use App\Component\Interface\RouterMethod;

class Router implements RouterMethod
{
    protected array $routes;

    public function __construct(){
        $this->routes = [];
    }

    public function get($path,$callback): void
    {
        $this->routes ['get'][$path] = $callback;
    }

    public function post($path, $callback): void
    {
        $this->routes ['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $_SERVER["REQUEST_URI"];
        $path = substr($path, 0, strpos($path, "?") ?: strlen($path));
    }
}