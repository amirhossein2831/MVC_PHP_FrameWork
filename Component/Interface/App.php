<?php

namespace App\Component\Interface;

use App\Models\UserModel;

interface App
{
    public function login(UserModel $user): bool;
    public function logout(): void;
    public function initialRouter(): void;
    public function run(): void;


}