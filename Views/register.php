<?php use App\core\Form\Field,App\core\Form\Form;?>
<?php Form::header('Register New Account');?>
<?php $form = Form::begin('', 'post'); ?>

    <div class="row">
        <div class="col"><?php echo $form->field($model, 'firstName', Field::TEXT_FIELD); ?></div>
        <div class="col"><?php echo $form->field($model, 'lastName',Field::TEXT_FIELD); ?></div>
    </div>

    <?php echo $form->field($model, 'password',Field::PASSWORD_FIELD); ?>
    <?php echo $form->field($model, 'confirmPassword',Field::PASSWORD_FIELD); ?>
    <?php echo $form->field($model, 'email',Field::TEXT_FIELD ); ?>

    <div class="row">
        <div class="col"><button type="submit" class="btn btn-primary">Submit</button></div>
        <div class="col"><a href="/" class="btn btn-primary">Go Back to Home</a></div>
    </div>

<?php Form::end(); ?>
