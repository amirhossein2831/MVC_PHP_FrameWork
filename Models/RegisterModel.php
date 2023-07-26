<?php

namespace App\Models;
class RegisterModel
{
    private string $firstName;
    private string $lastName;
    private string $password;
    private string $confirmPassword;
    private string $email;



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