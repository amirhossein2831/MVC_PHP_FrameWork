<?php

namespace App\Component\Util;

class Util
{
    public static function log($message): void
    {
        echo '[' . date("Y-m-d H:i:s") . '].' . "Message: $message" . PHP_EOL;
    }

}