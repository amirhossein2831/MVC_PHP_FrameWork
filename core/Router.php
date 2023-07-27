<?php

namespace App\core;

use App\Component\Interface\RouterMethod;
use App\Controller\SiteController;

class Router implements RouterMethod
{
    protected array $routes;

    public function __construct()
    {
        $this->routes = [];
    }

    public function get($path, $callback): void
    {
        $this->routes ['GET'][$path] = $callback;
    }

    public function post($path, $callback): void
    {
        $this->routes ['POST'][$path] = $callback;
    }

    public function resolve(): void
    {
        $request = Application::$app->getRequest();
        $response = Application::$app->getResponse();
        $path = $request->getPath();
        $method = $request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if (!$callback) {
            $response->setStatusCode(404);
            call_user_func([SiteController::class, 'notFount']);
            exit;
        }
        call_user_func($callback, $request);
    }
}