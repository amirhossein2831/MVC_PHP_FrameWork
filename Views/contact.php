<?php /** @var $model App\Models\UserModel */ ?>
<?php use App\core\Form\InputField;
use App\core\Form\Form; ?>

<div id="container" class="wrapper" style="height: auto;width: 500px">
    <div class="form-box register">
        <h2>Contact</h2>
        <?php Form::successAlert('your feedback help us to improve faster'); ?>
        <?php $form = Form::begin('', 'post'); ?>

        <?php echo $form->field($model, 'subject', InputField::TEXT_FIELD, 'person'); ?>
        <?php echo $form->field($model, 'description', InputField::TEXT_FIELD, 'text'); ?>
        <?php echo $form->field($model, 'email', InputField::TEXT_FIELD, 'mail'); ?>

        <?php $form->submitButton("Add Contact"); ?>
        <?php Form::end(); ?>
    </div>
</div>