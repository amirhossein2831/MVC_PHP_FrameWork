<?php

namespace App\core;

abstract class BaseModel
{
    public array $error = [];

    protected abstract function rules(): array;
    protected abstract function labels(): array;

    protected abstract function validate(): bool;

    public function loadDate($date): void
    {
        foreach ($date as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    protected function addErrorForRule(string $attribute, string $rule, $param = []): void
    {
        $message = Rules::errorMassage()[$rule] ?? '';
        foreach ($param as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->error[$attribute][] = $message;
    }

    protected function addError(string $attribute, string $message): void
    {
        $this->error[$attribute][] = $message;

    }

    public function hasError($attribute = null): mixed
    {
        if (is_null($attribute)) {
            return !empty($this->error);
        }
        return $this->error[$attribute] ?? false;
    }

    public function getError($attribute)
    {
        return $this->error[$attribute][0];
    }

}