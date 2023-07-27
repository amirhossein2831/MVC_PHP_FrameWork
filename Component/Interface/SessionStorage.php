<?php

namespace App\Component\Interface;

interface SessionStorage
{
    public function setFlush();
    public function getFlush();
}