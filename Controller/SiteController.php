<?php
namespace App\Controller;
use App\core\Application;
use App\core\BaseController;
use App\core\Request;

class SiteController extends BaseController
{
    public function __construct($view){
        parent::__construct($view);
    }
    public function home(): void
    {
        $this->view->renderView( 'home',  'newLayout');
    }

    public function contact(): void
    {
        $this->view->renderView('contact','newLayout',[
            'model' => Application::$app->getUser(),
        ]);
    }

    public function handleContact(Request $request): void
    {
        var_dump($request->getBody());
    }

}