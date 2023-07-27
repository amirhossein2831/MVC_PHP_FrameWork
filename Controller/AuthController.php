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
        $registerModel = new RegisterModel();           //TODO change with Login model

        if ($request->isPost()) {
            echo "should work with post";
        }
        $this->renderView('login', 'newLayout',[
            'model' => $registerModel
        ]);
    }

    public function register(Request $request)
    {
        $registerModel = new RegisterModel();
        if ($request->isPost()) {
            $registerModel->loadDate($request->getBody());

            if ($registerModel->validate() && $registerModel->register()) {
                return 'success';
            }
        }
        $this->renderView('register', 'newLayout', [
            'model' => $registerModel
        ]);
    }
}