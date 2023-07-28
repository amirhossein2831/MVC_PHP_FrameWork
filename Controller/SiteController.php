<?php
namespace App\Controller;
use App\core\Application;
use App\core\BaseController;
use App\core\Request;

class SiteController extends BaseController
{
    public function home(): void
    {
        $this->renderView( 'home',  'newLayout');            //if you want to pass value to view pass it to render view then pass it to contentofView
    }

    public function contact(): void
    {
        $this->renderView('contact','newLayout');
    }

    public function handleContact(Request $request): void
    {
        var_dump($request->getBody());
    }

    public static function notFount(): void
    {
        include_once Application::$ROOT . "/Views/notFound.php";
    }

}