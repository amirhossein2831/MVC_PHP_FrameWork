<?php

namespace App\core\Exception;

use Exception;

class ForbiddenException extends Exception
{
    protected $message = "you don't have access to this page";
    protected $code = 403;
}