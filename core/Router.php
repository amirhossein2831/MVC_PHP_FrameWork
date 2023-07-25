<?php

namespace App\core;

use App\Component\Interface\RouterMethod;
use App\Controller\SiteController;

class Router implements RouterMethod
{
    protected array $routes;
    private Request $request;
    private Response $response;

    public function __construct(Request $request,Response $response){
        $this->request = $request;
        $this->response = $response;
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
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if (!$callback) {
            $this->response->setStatusCode(404);
            call_user_func([SiteController::class,'notFount']);
            exit;
        }
        call_user_func($callback,$this->request);
    }
}