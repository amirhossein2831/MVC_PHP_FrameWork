<?php

namespace App\core;

abstract class Rules
{
    public const REQUIRED_FIELD = 'required';
    public const EMAIL = 'email';
    public const MIN_LENGTH = 'min';
    public const MAX_LENGTH = 'max';
    public const MATCH_FIELD = 'match';
    public const UNIQUE_EMAIL = 'unique';

    /**
     * @return array
     */
    public abstract static function rules(): array;

    /**
     * set a massage for every Rule
     * @return string[]
     */
    public static function errorMassage(): array
    {
        return [
            self::REQUIRED_FIELD => 'This field is required',
            self::EMAIL => 'This field must be a valid Email Address',
            self::MIN_LENGTH => 'The length of this field must be more than {min}',
            self::MAX_LENGTH => 'The length of this field must be less than {max}',
            self::MATCH_FIELD => 'This field must be match with {match}',
            self::UNIQUE_EMAIL => 'The {attribute} is already taken',
        ];
    }

}