<?php

namespace App\core;

abstract class Rules
{
    public abstract static function rules(): array;

    public abstract static function errorMassage(): array;

}