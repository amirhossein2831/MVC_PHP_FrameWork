<?php

namespace App\core\Form;

use App\core\BaseModel;

class InputField extends BaseField
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

    private string $type;
    private string $iconType;

    public function __construct(BaseModel $model, string $attribute, $type, $iconType)
    {
        parent::__construct($model, $attribute);
        $this->type = $type;
        $this->iconType = $iconType;
    }

    public function inputField(): string
    {
        return sprintf(
            ' <span class="icon"><ion-icon name="%s"></ion-icon></span>
                     <input class="field-input" name="%s" value="%s" type="%s">'
            , $this->iconType
            ,$this->attribute
            , $this->model->{$this->attribute}
            , $this->type);
    }
}