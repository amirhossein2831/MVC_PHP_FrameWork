<?php

namespace App\Models;
use App\core\BaseModel;

class RegisterModel extends BaseModel
{
    protected string $firstName;
    protected string $lastName;
    protected string $password;
    protected string $confirmPassword;
    protected string $email;


    public function register()
    {
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