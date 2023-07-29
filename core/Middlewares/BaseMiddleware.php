<?php

namespace App\core\Middlewares;

abstract class BaseMiddleware
{
    protected abstract function execute();
    
}