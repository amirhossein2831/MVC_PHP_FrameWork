<?php

namespace App\core;

use App\Rule\RegisterRule;

abstract class BaseModel
{
    public array $error = [];

    protected abstract function rules(): array ;

    protected abstract function validate(): bool;

    public function loadDate($date): void
    {
        foreach ($date as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    protected function addError(string $attribute,string $rule,$param = []): void
    {
        $message = RegisterRule::errorMassage()[$rule] ?? '';
        foreach ($param as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->error[$attribute][] = $message;
    }

    public function hasError(): bool
    {
        return !empty($this->error);
    }
}