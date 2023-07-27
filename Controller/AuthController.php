<?php

namespace App\Controller;

use App\Component\Interface\Authentication;
use App\core\BaseController;
use App\core\Request;
use App\Models\UserModel;

class AuthController extends BaseController implements Authentication
{
    public function login(Request $request)
    {
        $userModel = new UserModel();           //TODO change with Login model

        if ($request->isPost()) {
            echo "should work with post";
        }
        $this->renderView('login', 'newLayout',[
            'model' => $userModel
        ]);
    }

    public function register(Request $request): void
    {
        $userModel = new UserModel();
        if ($request->isPost()) {
            $userModel->loadDate($request->getBody());
            if ($userModel->validate() &&  $userModel->save()) {
                echo "success";
                return;
            }
        }
        $this->renderView('register', 'newLayout', [
            'model' => $userModel
        ]);
    }
}