<?php

namespace App\Models;

use App\core\Application;
use App\core\DBModel;
use App\core\Response;
use App\core\Rules;
use App\Rule\RegisterRule;
use PDO;

class UserModel extends DBModel
{
    public string $id;
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

                if ($ruleName === Rules::REQUIRED_FIELD && !$value) {
                    $this->addErrorForRule($attribute, Rules::REQUIRED_FIELD);
                }
                if ($ruleName === Rules::EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addErrorForRule($attribute, Rules::EMAIL);
                }
                if ($ruleName === Rules::MIN_LENGTH && strlen($value) < $rule['min']) {
                    $this->addErrorForRule($attribute, Rules::MIN_LENGTH, $rule);
                }
                if ($ruleName === Rules::MAX_LENGTH && strlen($value) > $rule['max']) {
                    $this->addErrorForRule($attribute, Rules::MAX_LENGTH, $rule);
                }
                if ($ruleName === Rules::MATCH_FIELD && $value != $this->{$rule['match']}) {
                    $this->addErrorForRule($attribute, Rules::MATCH_FIELD, $rule);
                }
                if ($ruleName === Rules::UNIQUE_EMAIL) {
                    $className = $rule['class'];
                    $tableName = $className::DBName();
                    $statement = Application::$app->getDataBase()->getPdo()->prepare("SELECT * FROM $tableName WHERE $attribute = :value");
                    $statement->bindValue(':value', $this->$attribute);
                    $statement->execute();
                    $records = $statement->fetch(PDO::FETCH_ASSOC);
                    if (!empty($records)) {
                        $this->addErrorForRule($attribute, Rules::UNIQUE_EMAIL, ['attribute' => $this->labels()[$attribute]]);
                    }
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
        return ['firstName', 'lastName', 'email', 'password', 'status'];
    }

    public function labels(): array
    {
        return [
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'password' => 'Password',
            'confirmPassword' => "Confirm Password",
            'email' => 'Email',
        ];
    }
}