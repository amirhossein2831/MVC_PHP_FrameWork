<?php
namespace App\Controller;
use App\core\Application;
use App\core\BaseController;
use App\core\Request;
use App\Models\ContactModel;

class SiteController extends BaseController
{
    public function __construct($view){
        parent::__construct($view);
    }
    public function home(): void
    {
        $this->view->renderView( 'home',  'newLayout');
    }

    public function contact(Request $request): void
    {
        $contactModel = new ContactModel();
        if ($request->isPost()) {
            $contactModel->loadDate($request->getBody());
            if ($contactModel->validate() && $contactModel->save()) {

            }
        }
        $this->view->renderView('contact','newLayout',[
            'model' => Application::$app->getUser(),
        ]);
    }

    public function handleContact(Request $request): void
    {
        var_dump($request->getBody());
    }

}