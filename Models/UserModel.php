<?php
namespace App\Models;

use App\core\DBModel;
use App\core\Response;
use App\Rule\RegisterRule;

class UserModel extends DBModel
{
    public string $firstName;
    public string $lastName;
    public string $password;
    public string $confirmPassword;
    public string $email;
    public mixed $status;

    public function __construct()
    {
        $this->firstName = '';
        $this->lastName = '';
        $this->password = '';
        $this->confirmPassword = '';
        $this->email = '';
        $this->status = Response::IN_ACTIVE_STATUS;

    }

    public function validate(): bool
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};

            foreach ($rules as $rule) {
                $ruleName = is_string($rule) ? $rule : $rule[0];

                if ($ruleName === RegisterRule::REQUIRED_FIELD && !$value) {
                    $this->addError($attribute, RegisterRule::REQUIRED_FIELD);
                }
                if ($ruleName === RegisterRule::EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($attribute, RegisterRule::EMAIL);
                }
                if ($ruleName === RegisterRule::MIN_LENGTH && strlen($value) < $rule['min']) {
                    $this->addError($attribute, RegisterRule::MIN_LENGTH, $rule);
                }
                if ($ruleName === RegisterRule::MAX_LENGTH && strlen($value) > $rule['max']) {
                    $this->addError($attribute, RegisterRule::MAX_LENGTH, $rule);
                }
                if ($ruleName === RegisterRule::MATCH_FIELD && $value != $this->{$rule['match']}) {
                    $this->addError($attribute, RegisterRule::MATCH_FIELD, $rule);
                }
            }
        }
        return !$this->hasError();
    }

    public function save(): bool
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->status = Response::ACTIVE_STATUS;
        return parent::save();
    }

    public function rules(): array
    {
        return RegisterRule::rules();
    }

    protected function DBName(): string
    {
        return 'users';
    }

    protected function column(): array
    {
        return ['firstName','lastName','email','password','status'];
    }
}