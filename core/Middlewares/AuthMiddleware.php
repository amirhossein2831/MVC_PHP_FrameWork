<?php

namespace App\core\Middlewares;

class AuthMiddleware extends BaseMiddleware
{
    private array $action;

    public function __construct(array $action = []){
        $this->action = $action;
    }

    protected function execute()
    {
        // TODO: Implement execute() method.
    }
}