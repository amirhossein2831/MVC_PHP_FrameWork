<?php

namespace App\core;

abstract class BaseModel
{
    public array $error = [];

    protected abstract function rules(): array;

    protected abstract function labels(): array;

    protected abstract function validate(): bool;

    /**
     * take all date and initial the Models
     * @param $date
     * @return void
     */
    public function loadDate($date): void
    {
        foreach ($date as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * @param string $attribute
     * @param string $rule
     * @param $param
     * @return void
     */
    protected function addErrorForRule(string $attribute, string $rule, $param = []): void
    {
        $message = Rules::errorMassage()[$rule] ?? '';
        foreach ($param as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->error[$attribute][] = $message;
    }

    /**
     * take the attribute and push an error to it
     * @param string $attribute
     * @param string $message
     * @return void
     */
    protected function addError(string $attribute, string $message): void
    {
        $this->error[$attribute][] = $message;

    }

    /**
     * check there is any error or not
     * @param $attribute
     * @return mixed
     */
    public function hasError($attribute = null): mixed
    {
        if (is_null($attribute)) {
            return !empty($this->error);
        }
        return $this->error[$attribute] ?? false;
    }

    /**
     * @param $attribute
     * @return mixed
     */
    public function getError($attribute): mixed
    {
        return $this->error[$attribute][0];
    }

}