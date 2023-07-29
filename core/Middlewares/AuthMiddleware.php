<?php

namespace App\core\Middlewares;

use App\core\Application;
use App\core\BaseController;
use App\core\Exception\ForbiddenException;

class AuthMiddleware extends BaseMiddleware
{
    private array $action;

    public function __construct(array $action = [])
    {
        $this->action = $action;
    }

    /** @throws ForbiddenException */
    public function execute(): void
    {
        if (Application::$app->isGuest()) {
            if (empty($this->action) || in_array(BaseController::$action, $this->action)) {
                throw new ForbiddenException();
            }
        }
    }
}