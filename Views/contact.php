<?php /** @var $model App\Models\UserModel */ ?>
<?php use App\core\Form\Field;
use App\core\Form\Form; ?>

<div id="container" class="wrapper" style="height: auto;width: 500px">
    <div class="form-box register">
        <h2>Contact</h2>
        <?php Form::successAlert('your feedback help us to improve faster'); ?>
        <?php $form = Form::begin('', 'post'); ?>

        <?php echo $form->field($model, 'subject', Field::TEXT_FIELD, 'person'); ?>
        <?php echo $form->field($model, 'description', Field::TEXT_FIELD, 'text'); ?>
        <?php echo $form->field($model, 'email', Field::TEXT_FIELD, 'mail'); ?>

        <?php $form->submitButton("Add Contact"); ?>
        <?php Form::end(); ?>
    </div>
</div>