<?php

namespace App\core;

use App\core\Middlewares\BaseMiddleware;

abstract class BaseController
{
    /**
     * @var BaseMiddleware[]
     */
    public array $middlewares = [];
    public static string $action = '';
    protected View $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    /**
     * take the middleware and add it to the middlewares
     * @param BaseMiddleware $middleware
     * @return void
     */
    protected function registerMiddleware(BaseMiddleware $middleware): void
    {
        $this->middlewares[] = $middleware;
    }

}