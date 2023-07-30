<?php

namespace App\Controller;

use App\Component\Util\Util;
use App\core\Application;
use App\core\BaseController;
use App\core\Request;
use App\Models\ContactModel;

class SiteController extends BaseController
{
    public function __construct($view)
    {
        parent::__construct($view);
    }

    public function home(): void
    {
        $this->view->renderView('home', 'newLayout');
    }

    public function contact(Request $request): void
    {
        $contactModel = new ContactModel();
        if ($request->isPost()) {
            $contactModel->loadDate($request->getBody());
            if ($contactModel->validate() && $contactModel->send()) {
                Application::$app->getSession()->setFlash('success', 'Thanks for Your FeedBack');
                Application::$app->getResponse()->redirect('/contact');
                return;
            }
        }
        $this->view->renderView('contact', 'newLayout', [
            'model' => $contactModel,
        ]);
    }

    public function about(): void
    {
        $this->view->renderView('about', 'newLayout');

    }
    public function service(): void
    {
        $this->view->renderView('service', 'newLayout');

    }
}