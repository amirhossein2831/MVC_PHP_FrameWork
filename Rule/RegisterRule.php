<?php

namespace App\Rule;

use App\core\Rules;
use App\Models\UserModel;

class RegisterRule extends Rules
{

    public static function rules(): array
    {
        return [
            'firstName' => [self::REQUIRED_FIELD],
            'lastName' => [self::REQUIRED_FIELD],
            'email' => [self::REQUIRED_FIELD, self::EMAIL, [self::UNIQUE_EMAIL, 'class' => UserModel::class]],
            'password' => [self::REQUIRED_FIELD, [self::MIN_LENGTH, 'min' => 8], [self::MAX_LENGTH, 'max' => 24]],
            'confirmPassword' => [self::REQUIRED_FIELD, [self::MATCH_FIELD, 'match' => 'password']]
        ];
    }
    
}