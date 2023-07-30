<?php

namespace App\Models;

use App\core\BaseModel;
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
        // TODO: Implement validate() method.
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