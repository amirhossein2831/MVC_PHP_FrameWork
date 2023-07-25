<?php
namespace App\Controller;
use App\core\Application;

class Controller
{

    public function home()
    {
        $this->renderView("Home");

    }

    public function contact()
    {
            $this->renderView("Contact");

    }

    public function renderView($view)
    {
        include_once Application::ROOT . "/Views/$view.php";
    }

}