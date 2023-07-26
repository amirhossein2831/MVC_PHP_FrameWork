<?php

namespace App\core;

abstract class BaseModel
{

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