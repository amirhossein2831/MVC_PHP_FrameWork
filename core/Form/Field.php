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

    private RegisterModel $model;
    private string $attribute;

    private string $type;

    private string $iconType;

    public function __construct(RegisterModel $model, string $attribute, $type, $iconType)
    {
        $this->model = $model;
        $this->attribute = $attribute;
        $this->type = $type;
        $this->iconType = $iconType;
    }

    public function __toString(): string
    {
        $hasError = $this->model->hasError($this->attribute);
        $string = $hasError ? sprintf('<div class="error-text">%s</div>', $this->model->getError($this->attribute)) : '';

        return sprintf('
             <div class="input-box%s">
                 <span class="icon">
                        <ion-icon name="%s"></ion-icon>
                 </span>
                <input id="firstName" name="%s" value="%s" type="%s">
                <label id="firstName-label">%s</label>
             </div>%s
           ', $hasError ? ' error-box' : ''
            , $this->iconType
            , $this->attribute
            , $this->model->{$this->attribute}
            , $this->type
            , $this->attribute
            , $string
        );
    }
}