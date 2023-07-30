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

    public function __construct($view){
        $this->view = $view;
    }

    protected function registerMiddleware(BaseMiddleware $middleware): void
    {
        $this->middlewares[] = $middleware;
    }

}