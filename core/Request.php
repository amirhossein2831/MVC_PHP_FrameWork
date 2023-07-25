<?php

namespace App\core;

class Request
{
    public function getPath(): string
    {
        $path = $_SERVER["REQUEST_URI"];
        return substr($path, 0, strpos($path, "?") ?: strlen($path));
    }

    public function method(): string
    {
        return $_SERVER["REQUEST_METHOD"];
    }
    public function getBody()
    {
        $body = [];
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            foreach ($_GET as $key => $velue) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach ($_POST as $key => $velue) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }
}