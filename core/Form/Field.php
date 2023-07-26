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

    public string $type;

    public function __construct(RegisterModel $model, string $attribute,$type)
    {
        $this->model = $model;
        $this->attribute = $attribute;
        $this->type = $type;
    }
    public function __toString(): string
    {
        return sprintf('
           <div class="mb-3">
              <label style="font-size: 20px;font-family:FreeSans,serif;margin-bottom: 5px">%s</label>
              <input type="%s" name="%s"  value="%s" class="form-control%s">
              <div class="invalid-feedback">%s</div>
         </div>
        ',$this->attribute
         ,$this->type
         ,$this->attribute
         ,$this->model->{$this->attribute}
         ,$this->model->hasError($this->attribute)? ' is-invalid' : ''
         ,$this->model->getError($this->attribute)
        );
    }
}