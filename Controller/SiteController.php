<?php
namespace App\Controller;
use App\core\BaseController;
use App\core\Request;

class SiteController extends BaseController
{
    public function home(): void
    {
        $this->renderView( 'home',  'newLayout');
    }

    public function contact(): void
    {
        $this->renderView('contact','newLayout');
    }

    public function handleContact(Request $request): void
    {
        var_dump($request->getBody());
    }

}