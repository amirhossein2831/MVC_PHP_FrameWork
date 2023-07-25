<?php

namespace App\core;

class Application
{
    private Router $router;

    public function __construct(){
        $this->router = new Router();
    }

    public function run()
    {
        $this->router->resolve();
    }

    public final function getRouter(): Router
    {
        return $this->router;
    }


}