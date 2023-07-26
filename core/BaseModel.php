<?php

namespace App\core;

abstract class BaseModel
{
    abstract public function rules(): array ;
    public function loadDate($date)
    {
        foreach ($date as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
    public function validate()
    {

    }

}