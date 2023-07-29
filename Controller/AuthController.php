<?php

namespace App\Controller;

use App\Component\Interface\Authentication;
use App\core\Application;
use App\core\BaseController;
use App\core\Request;
use App\Models\LoginModel;
use App\Models\UserModel;

class AuthController extends BaseController implements Authentication
{
    public function login(Request $request): void
    {
        $loginModel = new LoginModel();
        if ($request->isPost()) {
            $loginModel->loadDate($request->getBody());
            if ($loginModel->validate() && $loginModel->login()) {

//                Application::$app->getResponse()->redirect('/login');
                echo "success";
                return;
            }

        }
        $this->renderView('login', 'newLayout', [
            'model' => $loginModel
        ]);
    }

    public function register(Request $request): void
    {
        $userModel = new UserModel();
        if ($request->isPost()) {
            $userModel->loadDate($request->getBody());
            if ($userModel->validate() && $userModel->save()) {
                Application::$app->getSession()->setFlash('success','Thanks for registration');
                Application::$app->getResponse()->redirect('/login');
                return;
            }
        }
        $this->renderView('register', 'newLayout', [
            'model' => $userModel
        ]);
    }
}