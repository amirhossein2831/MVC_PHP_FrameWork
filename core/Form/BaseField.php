<?php

namespace App\core\Form;

use App\core\BaseModel;

abstract class BaseField
{
    protected BaseModel $model;

    protected string $attribute;
    public abstract function inputField(): string;


    public function __construct(BaseModel $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString(): string
    {
        $hasError = $this->model->hasError($this->attribute);
        $string = $hasError ? sprintf('<div class="error-text">%s</div>', $this->model->getError($this->attribute)) : '';
        
        return sprintf('
             <div class="input-box%s">
                    %s
                <label>%s</label>
             </div>%s
           ', $hasError ? ' error-box' : ''
            , $this->inputField()
            , $this->model->labels()[$this->attribute] ?? $this->attribute
            , $string
        );
    }
}