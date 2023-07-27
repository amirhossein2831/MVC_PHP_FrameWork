<?php

namespace App\Rule;

use App\core\Rules;
use App\Models\UserModel;

class RegisterRule extends Rules
{
    public const REQUIRED_FIELD = 'required';
    public const EMAIL = 'email';
    public const MIN_LENGTH = 'min';
    public const MAX_LENGTH = 'max';
    public const MATCH_FIELD = 'match';

    public const UNIQUE_EMAIL = 'unique';

    public static function rules(): array
    {
        return [
            'firstName' => [self::REQUIRED_FIELD],
            'lastName' => [self::REQUIRED_FIELD],
            'email' => [self::REQUIRED_FIELD, self::EMAIL,[self::UNIQUE_EMAIL,'class'=>UserModel::class]],
            'password' => [self::REQUIRED_FIELD, [self::MIN_LENGTH, 'min' => 8], [self::MAX_LENGTH, 'max' => 24]],
            'confirmPassword' => [self::REQUIRED_FIELD, [self::MATCH_FIELD, 'match' => 'password']]
        ];
    }

    public static function errorMassage(): array
    {
        return [
            self::REQUIRED_FIELD => 'This field is required',
            self::EMAIL => 'This field must be a valid email address',
            self::MIN_LENGTH => 'The length of this field must be more than {min}',
            self::MAX_LENGTH => 'The length of this field must be less than {max}',
            self::MATCH_FIELD => 'This field must be match with {match}',
            self::UNIQUE_EMAIL => 'The {attribute} is already taken',
        ];
    }
}