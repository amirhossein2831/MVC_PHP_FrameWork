<?php /** @var $model App\Models\UserModel */ ?>
<?php use App\core\Form\Form;?>

<div id="container" class="wrapper" style="height: auto">
    <div class="form-box register">
        <h2>Contact</h2>
        <?php $form = Form::begin('', 'post'); ?>
        <div class="input-box">
                 <span class="icon">
                        <ion-icon name="person"></ion-icon>
                 </span>
            <input class="field-input" name="subject"  type="text">
            <label>Subject</label>
        </div>

        <div class="input-box">
                 <span class="icon">
                        <ion-icon name="text"></ion-icon>
                 </span>
            <input class="field-input" name="Description" type="text">
            <label>Description</label>
        </div>
        <div class="input-box">
                 <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                 </span>
            <input class="field-input" name="email"  type="email">
            <label>Email</label>
        </div>

        <?php $form->submitButton("Add Contact");?>
        <?php Form::end(); ?>
    </div>
</div>