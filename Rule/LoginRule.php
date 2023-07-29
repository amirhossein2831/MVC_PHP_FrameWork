<?php

namespace App\Rule;

use App\core\Rules;

class LoginRule extends Rules
{
    public static function rules(): array
    {
        return [
            'email'=>[self::REQUIRED_FIELD,self::EMAIL],
            'password' =>[self::REQUIRED_FIELD],
        ];
    }
}