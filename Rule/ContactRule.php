<?php

namespace App\Rule;

use App\core\Rules;
use App\Models\ContactModel;

class ContactRule extends Rules
{

    public static function rules(): array
    {
        return [
            'subject' => [self::REQUIRED_FIELD],
            'description' => [self::REQUIRED_FIELD],
            'email' => [self::REQUIRED_FIELD, self::EMAIL, [self::UNIQUE_EMAIL, 'class' => ContactModel::class]],
        ];
    }
}