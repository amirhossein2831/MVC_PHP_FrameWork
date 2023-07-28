<?php

namespace App\core;

use App\Component\Interface\SessionStorage;

class Session implements SessionStorage
{
    public const FLASH_KEY = 'flash_message';

    public function __construct(){
        session_start();
    }

    public function setFlash($key,string $message): void
    {
        $_SESSION[self::FLASH_KEY][$key] = $message;

    }

    public function getFlash($key): mixed
    {
        return $_SESSION[self::FLASH_KEY][$key];
    }
    public function __destruct()
    {
        session_clo
    }
}