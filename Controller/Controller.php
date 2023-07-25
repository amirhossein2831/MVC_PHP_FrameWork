<?php
namespace App\Controller;
use App\core\Application;

class Controller
{

    public function home()
    {
        $this->renderView( 'home',  'main');
    }

    public function contact()
    {
        $this->renderView('contact','main');
    }

    public static function notFount()
    {
        include_once Application::ROOT . "/Views/notFound.php";
    }

    private function renderView($view, $layout): void
    {
        $layoutContent = $this->contentOfLayout($layout);
        $viewContent = $this->contentOfView($view);
        echo str_replace('{{content}}', $viewContent, $layoutContent);
    }

    private function contentOfView($view): false|string
    {
        ob_start();
        include_once Application::ROOT . "/Views/$view.php";
        return ob_get_clean();
    }

    private function contentOfLayout($layout): false|string
    {
        ob_start();
        include_once Application::ROOT . "/Views/layout/$layout.php";
        return ob_get_clean();
    }

}