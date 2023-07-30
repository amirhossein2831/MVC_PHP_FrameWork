<?php use App\core\Form\Form,App\core\Application; ?>
<?php $model = Application::$app->getUser(); ?>
<div id="container" class="wrapper" style="height: auto;text-align: center;width: 500px">
    <div class="profile-container">
        <div class="profile-header"><h1>Profile</h1></div>
        <?php Form::profileField('FirstName',$model->firstName);?>
        <?php Form::profileField('Last Name',$model->lastName);?>
        <?php Form::profileField('Email Address',$model->email);?>
        <?php Form::profileField('Access:','user');?>
    </div>
</div>
