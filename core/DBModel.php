<?php

namespace App\core;

abstract class DBModel extends BaseModel
{
    protected abstract function DBName(): string;

    public function save(){

    }

}