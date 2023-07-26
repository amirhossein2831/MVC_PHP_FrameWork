<?php

namespace App\core;

use App\Controller\AuthController;
use App\Controller\SiteController;

class Application
{
    public static string $ROOT;
    private Request $request;
    private Response $response;
    private Router $router;
    private DataBase $dataBase;

    public function __construct(array $config){
        self::$ROOT = dirname(__DIR__);
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request,$this->response);
        $this->dataBase = new DataBase($config['db']);
    }

    public function run(): void
    {
        $this->router->resolve();
    }

    public function initialRouter(): void
    {
        $siteController = new SiteController();
        $authController = new AuthController();
        $this->getRouter()->get('/',[$siteController,'home']);
        $this->getRouter()->get('/home',[$siteController,'home']);
        $this->getRouter()->get('/contact',[$siteController,'contact']);
        $this->getRouter()->post('/contact',[$siteController,'handleContact']);

        $this->getRouter()->get('/login',[$authController,'login']);
        $this->getRouter()->post('/login',[$authController,'login']);
        $this->getRouter()->get('/register',[$authController,'register']);
        $this->getRouter()->post('/register',[$authController,'register']);
    }
    public final function getRouter(): Router
    {
        return $this->router;
    }
}