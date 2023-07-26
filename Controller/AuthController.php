<?php

namespace App\Controller;

use App\Component\Interface\Authentication;
use App\core\BaseController;
use App\core\Request;
use App\Models\RegisterModel;

class AuthController extends BaseController implements Authentication
{
    public function login(Request $request)
    {
        if ($request->isPost()) {
            echo "should work with post";
        }
        $this->renderView('login', 'auth');
    }

    public function register(Request $request)
    {
        $registerModel = new RegisterModel();
        if ($request->isPost()) {
            $registerModel->loadDate();

            if ($registerModel->validate() && $registerModel->register()) {
                return 'success';
            }
            
        }
        $this->renderView('register', 'auth', [
            'model' => $registerModel
        ]);
    }
}