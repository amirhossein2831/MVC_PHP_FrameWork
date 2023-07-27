<?php

namespace App\core;

use App\Component\Interface\SessionStorage;

class Session implements SessionStorage
{

    public function __construct(){
        session_start();
    }

    public function setFlush()
    {

    }

    public function getFlush()
    {

    }
}