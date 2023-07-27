<?php use App\core\Form\Field,App\core\Form\Form;?>

<div id="container" class="wrapper">
    <div class="form-box login">
        <h2>Login</h2>
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
