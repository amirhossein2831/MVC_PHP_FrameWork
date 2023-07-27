<?php
namespace App\Component\Interface;

interface RouterMethod
{
    public function get($path,$callback): void;

    public function post($path,$callback): void;

    public function resolve();

}