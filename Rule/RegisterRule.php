<?php

namespace App\Rule;

use App\core\Rules;

class RegisterRule extends Rules
{
    public const REQUIRED_FIELD = 'required';
    public const EMAIL = 'email';
    public const MIN_LENGTH = 'min';
    public const MAX_LENGTH = 'max';
    public const MATH_FIELD = 'match';
    public const UNIQ = 'uniq';

    public static function rules(): array
    {
        return [
            'firstName' => [self::REQUIRED_FIELD],
            'lastName' => [self::REQUIRED_FIELD],
            'email' => [self::REQUIRED_FIELD, self::EMAIL],
            'password' => [self::REQUIRED_FIELD, [self::MIN_LENGTH, 'min' => 8], [self::MAX_LENGTH, 'max' => 24]],
            'confirmPassword' => [self::REQUIRED_FIELD, [self::MATH_FIELD, 'match' => 'password']]
        ];
    }

}