<?php

namespace App\core;

class Request
{
    public function getPath()
    {
        $path = $_SERVER["REQUEST_URI"];
        return substr($path, 0, strpos($path, "?") ?: strlen($path));
    }

    public function getMethod()
    {
        return $_SERVER["REQUEST_METHOD"];
    }


}