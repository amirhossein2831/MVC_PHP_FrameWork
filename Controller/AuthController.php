<?php

namespace App\Controller;

use App\Component\Interface\Authentication;
use App\core\BaseController;

class AuthController extends BaseController implements Authentication
{
    public function login()
    {
        $this->renderView('login','main');
    }

    public function register()
    {
        $this->renderView('register','main');
    }
}