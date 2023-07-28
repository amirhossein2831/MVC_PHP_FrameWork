<?php use App\core\Form\Field,App\core\Form\Form,App\core\Application;?>
<?php $session = Application::$app->getSession();?>
<div id="container" class="wrapper" style="height: auto">
    <div class="form-box login">
        <h2>Login</h2>

        <?php if ($session->getFlash('success')): ?>
            <div class="alert alert-success" id="successAlert">
                <span style="text-align: center;color: darkcyan;font-style: italic"><?php echo $session->getFlash('success');?>
                <br> <p style="font-size: 15px;color: black">now you can login</p></span>
                <button type="button" class="close-button" onclick="closeAlert()">x</button>
            </div>
        <?php endif; ?>

        <?php $form = Form::begin('', 'post'); ?>
            <?php echo $form->field($model, 'email',Field::TEXT_FIELD,'mail'); ?>
            <?php echo $form->field($model, 'password',Field::PASSWORD_FIELD,'lock-closed'); ?>

            <div class="remember-forget">
                <label ><input type="checkbox">Remember me</label>
                <a href="">ForgetPassword</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="login-register">
                <p>Don't have an account?<a href="/register" class="register-link">Register</a></p>
            </div>
        <?php Form::end(); ?>
    </div>
</div>
