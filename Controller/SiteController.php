<?php
namespace App\Controller;
use App\core\Application;
use App\core\BaseController;
use App\core\Request;

class SiteController extends BaseController
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

}