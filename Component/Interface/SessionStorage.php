<?php

namespace App\Component\Interface;

interface SessionStorage
{
    public function setFlash($key,string $message): void;
    public function getFlash($key):mixed;
}