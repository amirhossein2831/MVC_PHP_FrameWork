<?php

namespace App\core;

abstract class BaseController
{
    protected function renderView($view, $layout): void
    {
        $layoutContent = $this->contentOfLayout($layout);
        $viewContent = $this->contentOfView($view);
        echo str_replace('{{content}}', $viewContent, $layoutContent);
    }

    private function contentOfView($view): false|string
    {
        ob_start();
        include_once Application::$ROOT . "/Views/$view.php";
        return ob_get_clean();
    }

    private function contentOfLayout($layout): false|string
    {
        ob_start();
        include_once Application::$ROOT . "/Views/layout/$layout.php";
        return ob_get_clean();
    }

}