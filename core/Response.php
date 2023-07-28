<?php

namespace App\core;

class Response
{
    public const IN_ACTIVE_STATUS = 0;
    public const ACTIVE_STATUS = 1;
    public const DELETED_STATUS = 2;
    public function setStatusCode(int $code): void
    {
        http_response_code($code);
    }

    public function redirect($url): void
    {
        header("Location: " . $url);
    }

}