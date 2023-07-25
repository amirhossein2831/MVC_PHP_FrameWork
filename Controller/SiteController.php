<?php
namespace App\Controller;
use App\core\Application;
use App\core\Request;

class SiteController
{
    public function home()
    {
        $this->renderView( 'home',  'main');            //if you want to pass value to view pass it to render view then pass it to contentofView
    }

    public function contact()
    {
        $this->renderView('contact','main');
    }

    public function handleContact(Request $request)
    {
        var_dump($request->getBody());
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