<?php

namespace App\core\Form;

use App\Models\RegisterModel;

class Form
{
    public static function header($value): void
    {
        echo sprintf('<h1  style="font-family:FreeSans,serif;margin:30px 0 40px 0">%s</h1>', $value);
    }

    public static function begin(string $action, string $method): Form
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public function field(RegisterModel $model, $attribute, $type, $iconType): Field
    {
        return new Field($model, $attribute, $type, $iconType);
    }

    public static function end(): void
    {
        echo '</form>';
    }
}