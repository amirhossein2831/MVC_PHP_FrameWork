<?php

namespace App\Models;
use App\core\BaseModel;
use App\Rule\RegisterRule;

class RegisterModel extends BaseModel
{
    protected string $firstName;
    protected string $lastName;
    protected string $password;
    protected string $confirmPassword;
    protected string $email;

    public function validate(): bool
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
        return $this->hasError();
    }

    public function register()
    {
        //TODO: save the date in DB
    }
    public function rules(): array
    {
        return RegisterRule::rules();
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }


    public function getLastName(): string
    {
        return $this->lastName;
    }


    public function getPassword(): string
    {
        return $this->password;
    }


    public function getConfirmPassword(): string
    {
        return $this->confirmPassword;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

}