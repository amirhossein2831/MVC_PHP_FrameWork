<?php

namespace App\Models;

use App\core\BaseModel;
use App\core\Rules;
use App\Rule\ContactRule;

class ContactModel extends BaseModel
{
    private int $id;
    private string $subject;
    private string $descripion;
    private string $email;
    public function __construct(){
        $this->subject = '';
        $this->descripion = '';
        $this->email = '';
    }

    protected function rules(): array
    {
        return ContactRule::rules();
    }

    protected function validate(): bool
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

    protected function labels(): array
    {
        return [
            'subject' => 'Enter Subject',
            'email' => 'Email',
            'description' => 'Enter Description'
        ];
    }
}