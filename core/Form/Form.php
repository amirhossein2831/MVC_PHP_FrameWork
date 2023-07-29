<?php

namespace App\core\Form;

use App\Models\UserModel;

class Form
{
    public static function begin(string $action, string $method): Form
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public function field(UserModel $model, $attribute, $type, $iconType): Field
    {
        return new Field($model, $attribute, $type, $iconType);
    }

    public static function end(): void
    {
        echo '</form>';
    }
}