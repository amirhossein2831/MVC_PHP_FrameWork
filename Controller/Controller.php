<?php
namespace App\Controller;
use App\core\Application;

class Controller
{

    public function home()
    {
        $this->renderLayout('main','home');
    }

    public function contact()
    {
        $this->renderLayout('main','contact');

    }

    public function renderView($view)
    {
        ob_start();
        include_once Application::ROOT . "/Views/$view.php";
        return ob_get_clean();
    }

    public function renderLayout($layout,$view)
    {
        $content = $this->renderView($view);
        include_once Application::ROOT . "/Views/layout/$layout.php";
    }

}