<?php

namespace App\core;

use App\Controller\AuthController;
use App\Controller\SiteController;
use App\Models\UserModel;

class Application
{
    public static string $ROOT;
    private Request $request;
    private Response $response;
    private Router $router;
    private DataBase $dataBase;
    private Session $session;

    public static Application $app;
    private ?UserModel $user;

    public function __construct(array $config)
    {
        self::$ROOT = dirname(__DIR__);
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router();
        $this->dataBase = new DataBase($config['db']);
        $this->session = new Session();
        self::$app = $this;
        $this->setUser();
    }

    public function run(): void
    {
        $this->router->resolve();
    }

    public function initialRouter(): void
    {
        $siteController = new SiteController();
        $authController = new AuthController();
        $this->getRouter()->get('/', [$siteController, 'home']);
        $this->getRouter()->get('/home', [$siteController, 'home']);
        $this->getRouter()->get('/contact', [$siteController, 'contact']);
        $this->getRouter()->post('/contact', [$siteController, 'handleContact']);

        $this->getRouter()->get('/login', [$authController, 'login']);
        $this->getRouter()->post('/login', [$authController, 'login']);
        $this->getRouter()->get('/register', [$authController, 'register']);
        $this->getRouter()->post('/register', [$authController, 'register']);
        $this->getRouter()->get('/logout', [$authController, 'logout']);
        $this->getRouter()->post('/logout', [$authController, 'logout']);
        $this->getRouter()->get('/profile', [$authController, 'profile']);
        $this->getRouter()->post('/profile', [$authController, 'profile']);
    }

    public final function getRouter(): Router
    {
        return $this->router;
    }

    /**
     * @return DataBase
     */
    public function getDataBase(): DataBase
    {
        return $this->dataBase;
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @return Session
     */
    public function getSession(): Session
    {
        return $this->session;
    }

    public function login(UserModel $user): bool
    {
        $this->session->set('user', $user->id);
        return true;
    }

    public function logout(): void
    {
        $this->user = null;
        $this->session->remove('user');
    }

    private function setUser(): void
    {
        $userId = $this->session->get('user');
        if ($userId) {
            $this->user = new UserModel();
            $date = $this->user->findUserById(['id' => $userId]);
            $this->user->loadDate($date);
        } else
            $this->user = null;
    }

    public function isGuest(): bool
    {
        return is_null($this->user);
    }
}