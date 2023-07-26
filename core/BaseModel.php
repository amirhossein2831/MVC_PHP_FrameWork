<?php

namespace App\core;

use App\Rule\RegisterRule;

abstract class BaseModel
{
    public array $error = [];
    abstract public function rules(): array ;
    public function loadDate($date): void
    {
        foreach ($date as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};

            foreach ($rules as $rule) {
                $ruleName = is_string($rule) ? $rule : $rule[0];

                if($ruleName === RegisterRule::REQUIRED_FIELD && !$value){
                    $this->addError($attribute, RegisterRule::REQUIRED_FIELD);
                }
                if ($ruleName === RegisterRule::EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($attribute,RegisterRule::EMAIL);
                }
                if ($ruleName === RegisterRule::MIN_LENGTH && strlen($value) < $rule['min']) {
                    $this->addError($attribute,RegisterRule::MIN_LENGTH,$rule);
                }
                if ($ruleName === RegisterRule::MAX_LENGTH && strlen($value) > $rule['max']) {
                    $this->addError($attribute,RegisterRule::MAX_LENGTH,$rule);
                }
                if ($ruleName === RegisterRule::MATH_FIELD && $value !== $this->{$rules['match']}) {
                    $this->addError($attribute,RegisterRule::MATH_FIELD,$rule);
                }
            }
        }
        return empty($this->error);
    }

    public function addError(string $attribute,string $rule,$param = [])
    {
        $message = RegisterRule::errorMassage()[$rule] ?? '';
        foreach ($param as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->error[$attribute][] = $message;
    }

}