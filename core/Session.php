<?php

namespace App\core;

use App\Component\Interface\SessionStorage;

class Session implements SessionStorage
{
    public const FLASH_KEY = 'flash_message';

    /**
     * in the constructor, mark the existing SessionFlash to delete in destructor
     */
    public function __construct()
    {
        session_start();
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as &$flashMessage) {
            $flashMessage['remove'] = true;
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }

    /**
     * this method find existing SessionFlash and delete it
     */
    public function __destruct()
    {
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as $key => &$flashMessage) {
            if ($flashMessage['remove']) {
                unset($flashMessages[$key]);
            }
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }

    public function setFlash($key, string $message): void
    {
        $_SESSION[self::FLASH_KEY][$key] = [
            'value' => $message,
            'remove' => false,
        ];
    }

    public function getFlash($key): mixed
    {
        return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;
    }
}