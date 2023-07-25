<?php

namespace App\Controller;

use App\Component\Interface\Authentication;
use App\core\BaseController;
use App\core\Request;

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
        if ($request->isPost()) {
            echo "should work with post";
        }
        $this->renderView('register', 'auth');
    }
}