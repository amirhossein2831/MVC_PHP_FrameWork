<?php

namespace App\Component\Interface;

use App\core\Request;

interface Authentication
{
    public function login(Request $request);

    public function register(Request $request);

}