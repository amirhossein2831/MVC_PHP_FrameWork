<?php

namespace App\core\Form;

use App\Models\RegisterModel;

class Field
{
    public const TEXT_FIELD = 'text';
    public const PASSWORD_FIELD = 'password';
    public const CHECKBOX_FIELD = 'checkbox';
    public const RADIO_BUTTON = 'radio';
    public const SUBMIT_BUTTON = 'submit';
    public const FILE_FIELD = 'file';
    public const HIDDEN_FIELD = 'hidden';
    public const NUMBER_FIELD = 'number';
    public const EMAIL_FIELD = 'email';
    public const DATE_FIELD = 'date';
    public const RANGE_FIELD = 'range';
    public const COLOR_FIELD = 'color';

    public RegisterModel $model;
    public string $attribute;

 
}