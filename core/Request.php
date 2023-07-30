<?php

namespace App\core;

class Request
{
    /**
     * get teh path from url
     * @return string
     */
    public function getPath(): string
    {
        $path = $_SERVER["REQUEST_URI"];
        return substr($path, 0, strpos($path, "?") ?: strlen($path));
    }

    /**
     * set the body of request
     * @return array
     */
    public function getBody(): array
    {
        $body = [];
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }

    /**
     * get the method of request
     * @return string
     */
    public function method(): string
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    /**
     * @return bool
     */
    public function isPost(): bool
    {
        return $this->method() === 'POST';
    }

}