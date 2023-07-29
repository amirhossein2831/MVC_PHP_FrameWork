<?php

namespace App\core\Exception;

use Exception;

class PageNotFoundException extends Exception
{
    protected $message = "NOT FOUND";
    protected $code = 404;
}