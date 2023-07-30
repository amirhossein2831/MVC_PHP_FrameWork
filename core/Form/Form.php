<?php

namespace App\core\Form;

use App\core\Application;
use App\core\BaseModel;

class Form
{
    public static function begin(string $action, string $method): Form
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public function field(BaseModel $model, $attribute, $type, $iconType): Field
    {
        return new Field($model, $attribute, $type, $iconType);
    }

    public static function end(): void
    {
        echo '</form>';
    }

    public static function successAlert($helpMessage): void
    {
        $session = Application::$app->getSession();
        $message = $session->getFlash('success');

        if ($message) {
            echo '
                    <div class="alert alert-success" id="successAlert">
                        <span style="text-align: center;color: darkcyan;font-style: italic">' . $message . ' 
                        <br> <p style="font-size: 13px;color: black">'.$helpMessage.'</p></span>
                        <button type="button" class="close-button" onclick="closeAlert()">x</button>
                    </div>
                  ';
        }
    }

    public function rememberMe(): void
    {
        echo '
             <div class="remember-forget">
                <label ><input type="checkbox">Remember me</label>
                <a href="">ForgetPassword</a>
             </div>
        ';
    }

    public function submitButton($type): void
    {
        echo sprintf('<button type="submit" class="btn">%s</button>', $type);
    }

    public function loginRegisterRedirect($link, $type, $note): void
    {
        echo sprintf(' 
                 <div class="login-register">
                   <p>%s<a href="%s" class="register-link">%s</a></p>
                </div>'
            , $note
            , $link
            , $type);
    }
    public static function profileField($name,$value): void
    {
        echo sprintf('<div class="profile-field">%s :<span> %s</span></div>',$name,$value);
    }
}