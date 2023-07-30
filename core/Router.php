<?php

namespace App\core;

use App\Component\Interface\RouterMethod;
use App\core\Exception\PageNotFoundException;

class Router implements RouterMethod
{
    protected array $routes;

    public function __construct()
    {
        $this->routes = [];
    }

    /**
     * initial the getMethod path
     * @param $path
     * @param $callback
     * @return void
     */
    public function get($path, $callback): void
    {
        $this->routes ['GET'][$path] = $callback;
    }

    /**
     * initial the postMethod path
     * @param $path
     * @param $callback
     * @return void
     */
    public function post($path, $callback): void
    {
        $this->routes ['POST'][$path] = $callback;
    }

    /**
     * get the path and method and call the method from it's controller
     * @return void
     * @throws PageNotFoundException
     */
    public function resolve(): void
    {
        /**
         * @var BaseController $controller
         */
        $request = Application::$app->getRequest();
        $path = $request->getPath();
        $method = $request->method();
        $callback = $this->routes[$method][$path] ?? false;
        BaseController::$action = $callback[1] ?? '';
        $controller = $callback[0];
        foreach ($controller->middlewares as $middleware) {
            $middleware->execute();
        }
        if (!$callback) {
            throw new PageNotFoundException();
        }
        call_user_func($callback, $request);
    }
}
