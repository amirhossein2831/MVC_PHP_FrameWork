<?php /** @var $model App\Models\UserModel */ ?>
<?php use App\core\Form\Field,App\core\Form\Form;?>

<div id="container" class="wrapper" style="height: auto">
    <div class="form-box register">
        <h2>Registration</h2>
        <?php $form = Form::begin('', 'post'); ?>

            <?php echo $form->field($model, 'firstName', Field::TEXT_FIELD,'person'); ?>
            <?php echo $form->field($model, 'lastName',Field::TEXT_FIELD,'person'); ?>
            <?php echo $form->field($model, 'password',Field::PASSWORD_FIELD,'lock-closed'); ?>
            <?php echo $form->field($model, 'confirmPassword',Field::PASSWORD_FIELD,'lock-closed'); ?>
            <?php echo $form->field($model, 'email',Field::TEXT_FIELD,'mail' ); ?>
            <?php $form->submitButton("Register");?>
            <?php $form->loginRegisterRedirect('/login','Login',"Already have an account?");?>

        <?php Form::end(); ?>
    </div>
</div>