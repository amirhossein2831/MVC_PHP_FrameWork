<?php /** @var $model App\Models\LoginModel */ ?>
<?php use App\core\Form\Field,App\core\Form\Form;?>

<div id="container" class="wrapper" style="height: auto">
    <div class="form-box login">
        <h2>Login</h2>
        <?php Form::successRegister();?>
        <?php $form = Form::begin('', 'post'); ?>

            <?php echo $form->field($model, 'email',Field::TEXT_FIELD,'mail'); ?>
            <?php echo $form->field($model, 'password',Field::PASSWORD_FIELD,'lock-closed'); ?>
            <?php $form->rememberMe();?>
            <?php $form->submitButton("Login");?>
            <?php $form->loginRegisterRedirect('/register','Register',"Don't have an account?");?>

        <?php Form::end(); ?>
    </div>
</div>
