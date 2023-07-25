<?php

namespace App\core;

use App\Controller\Controller;

class Application
{
    public const ROOT = '/opt/lampp/htdocs/project/PHPFrameWork';
    private Request $request;
    private Router $router;

    public function __construct(){
        $this->request = new Request();
        $this->router = new Router($this->request);
        $this->initialRouter();
    }

    public function run(): void
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

    public function initialRouter(): void
    {
        $controller = new Controller();
        $this->getRouter()->get('/',[$controller,'home']);
        $this->getRouter()->get('/contact',[$controller,'contact']);
    }

}