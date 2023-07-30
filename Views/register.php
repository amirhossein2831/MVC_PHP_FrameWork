<?php /** @var $model App\Models\UserModel */ ?>
<?php use App\core\Form\InputField,App\core\Form\Form;?>

<div id="container" class="wrapper" style="height: auto;width: 500px">
    <div class="form-box register">
        <h2>Registration</h2>
        <?php $form = Form::begin('', 'post'); ?>

            <?php echo $form->field($model, 'firstName', InputField::TEXT_FIELD,'person'); ?>
            <?php echo $form->field($model, 'lastName',InputField::TEXT_FIELD,'person'); ?>
            <?php echo $form->field($model, 'password',InputField::PASSWORD_FIELD,'lock-closed'); ?>
            <?php echo $form->field($model, 'confirmPassword',InputField::PASSWORD_FIELD,'lock-closed'); ?>
            <?php echo $form->field($model, 'email',InputField::TEXT_FIELD,'mail' ); ?>
            <?php $form->submitButton("Register");?>
            <?php $form->loginRegisterRedirect('/login','Login',"Already have an account?");?>

        <?php Form::end(); ?>
    </div>
</div>