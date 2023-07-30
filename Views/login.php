<?php /** @var $model App\Models\LoginModel */ ?>
<?php use App\core\Form\InputField, App\core\Form\Form; ?>

<div id="container" class="wrapper" style="height: auto;width: 500px">
    <div class="form-box login">
        <h2>Login</h2>
        <?php Form::successAlert('now you can login'); ?>
        <?php $form = Form::begin('', 'post'); ?>

        <?php echo $form->field($model, 'email', InputField::TEXT_FIELD, 'mail'); ?>
        <?php echo $form->field($model, 'password', InputField::PASSWORD_FIELD, 'lock-closed'); ?>
        <?php $form->rememberMe(); ?>
        <?php $form->submitButton("Login"); ?>
        <?php $form->loginRegisterRedirect('/register', 'Register', "Don't have an account?"); ?>

        <?php Form::end(); ?>
    </div>
</div>
