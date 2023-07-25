<?php

namespace App\core;

class Request
{
    public function getPath(): string
    {
        $path = $_SERVER["REQUEST_URI"];
        return substr($path, 0, strpos($path, "?") ?: strlen($path));
    }

    public function getMethod(): string
    {
        return $_SERVER["REQUEST_METHOD"];
    }
}