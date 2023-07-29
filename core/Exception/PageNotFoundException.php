<?php

namespace App\core\Exception;

use Exception;

class PageNotFoundException extends Exception
{
    protected $message = "The requested page could not be found on the server.";
    protected $code = 404;

    public function header(): string
    {
        return "Page Not Found";
    }
}