<?php

namespace App\core;

class Response
{
    public const IN_ACTIVE_STATUS = 0;
    public const ACTIVE_STATUS = 1;
    public const DELETED_STATUS = 2;

    /**
     * @param int $code
     * @return void
     */
    public function setStatusCode(int $code): void
    {
        http_response_code($code);
    }

    /**
     * @param $url
     * @return void
     */
    public function redirect($url): void
    {
        header("Location: " . $url);
    }

}