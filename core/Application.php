<?php

namespace App\core;

use App\Component\Interface\App;
use App\Controller\AuthController;
use App\Controller\SiteController;
use App\core\db\DataBase;
use App\core\Exception\ForbiddenException;
use App\Models\UserModel;

class Application implements App
{
    public static string $ROOT;
    private Request $request;
    private Response $response;
    private Router $router;
    private DataBase $dataBase;
    private Session $session;

    public static Application $app;
    private ?UserModel $user;
    private BaseController $controller;
    private View $view;


    public function __construct(array $config)
    {
        self::$ROOT = dirname(__DIR__);
        $this->request = new Request();
        $this->view = new View();
        $this->response = new Response();
        $this->router = new Router();
        $this->dataBase = new DataBase($config['db']);
        $this->session = new Session();
        self::$app = $this;
        $this->setUser();
    }

    public function run(): void
    {
        try {
            $this->router->resolve();
        } catch (Exception\PageNotFoundException $exception) {
            $this->response->setStatusCode(404);
            $this->view->renderView('error', 'errorLayout', [
                'exception' => $exception
            ]);
        } catch (ForbiddenException $exception) {
            $this->response->setStatusCode(403);
            $this->view->renderView('error', 'errorLayout', [
                'exception' => $exception
            ]);
        }

    }

    /**
     * generate the path of the Application
     * @return void
     */
    public function initialRouter(): void
    {
        $siteController = new SiteController($this->view);
        $authController = new AuthController($this->view);
        $this->controller = $authController;
        $this->getRouter()->get('/', [$siteController, 'home']);
        $this->getRouter()->get('/home', [$siteController, 'home']);
        $this->getRouter()->get('/contact', [$siteController, 'contact']);
        $this->getRouter()->post('/contact', [$siteController, 'contact']);
        $this->getRouter()->get('/about', [$siteController, 'about']);
        $this->getRouter()->post('/about', [$siteController, 'about']);
        $this->getRouter()->get('/service', [$siteController, 'service']);
        $this->getRouter()->post('/service', [$siteController, 'service']);

        $this->getRouter()->get('/login', [$authController, 'login']);
        $this->getRouter()->post('/login', [$authController, 'login']);
        $this->getRouter()->get('/register', [$authController, 'register']);
        $this->getRouter()->post('/register', [$authController, 'register']);
        $this->getRouter()->get('/logout', [$authController, 'logout']);
        $this->getRouter()->post('/logout', [$authController, 'logout']);
        $this->getRouter()->get('/profile', [$authController, 'profile']);
        $this->getRouter()->post('/profile', [$authController, 'profile']);
    }


    /**
     * set user id in session
     * @param UserModel $user
     * @return bool
     */
    public function login(UserModel $user): bool
    {
        $this->session->set('user', $user->id);
        return true;
    }

    /**
     * logout and remove userid from Sessoin
     * @return void
     */
    public function logout(): void
    {
        $this->user = null;
        $this->session->remove('user');
    }

    /**
     * when user login save the user
     * @return void
     */
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

    /**
     * check that the user has loginAuth or not
     * @return bool
     */
    public function isGuest(): bool
    {
        return is_null($this->user);
    }

    /**
     * @return UserModel|null
     */
    public function getUser(): ?UserModel
    {
        return $this->user;
    }

    /**
     * @return BaseController
     */
    public function getController(): BaseController
    {
        return $this->controller;
    }

    /**
     * @return Router
     */
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

}