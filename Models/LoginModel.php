<?php

namespace App\Models;

use App\core\Application;
use App\core\BaseModel;
use App\core\Rules;
use App\Rule\LoginRule;

class LoginModel extends BaseModel
{
    public string $email;

    public string $password;

    public function __construct()
    {
        $this->password = '';
        $this->email = '';
    }


    public function rules(): array
    {
        return LoginRule::rules();
    }

    public function validate(): bool
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};

            foreach ($rules as $rule) {
                $ruleName = is_string($rule) ? $rule : $rule[0];

                if ($ruleName === Rules::REQUIRED_FIELD && !$value) {
                    $this->addErrorForRule($attribute, Rules::REQUIRED_FIELD);
                }
                if ($ruleName === Rules::EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addErrorForRule($attribute, Rules::EMAIL);
                }
            }
        }
        return !$this->hasError();
    }

    public function labels(): array
    {
        return [
            'password' => 'Password',
            'email' => 'Email',
        ];
    }

    public function login(): bool
    {
        $user = new UserModel();
        $date = $user->findUserByEmail(['email' => $this->email]);
        if ($date === false) {
            $this->addError('email', 'the user does not exits with this Email');
            return false;
        }
        $user->loadDate($date);
        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is incorrect');
            return false;
        }
        return Application::$app->login($user);
    }
}