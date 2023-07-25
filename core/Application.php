<?php

namespace App\core;

class Application
{
    private Request $request;
    private Router $router;

    public function __construct(){
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        $this->router->resolve();
    }

    public final function getRouter(): Router
    {
        return $this->router;
    }

    public final function getRequest(): Request
    {
        return $this->request;
    }

}