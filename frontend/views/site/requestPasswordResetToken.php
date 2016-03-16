<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->registerCssFile('@web/statics/css/user.css',['depends'=>['frontend\assets\AppAsset']]);

$this->title = '通过邮箱找回密码';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="wrapper">
    <div class="login-body">
    	<div class="login-body-bd">
        	<div class="login-body-bd-tit">找回密码</div>
            <div class="find-mail">
                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                
                    邮箱：
                <?= Html::activeTextInput($model, 'email',['autofocus' => true,'class'=>'user-text']); ?>

                <div class="c-login" style="width:400px;"><input type="submit" class="c-login-button" value="立即找回"></div>

                <?php ActiveForm::end(); ?>
            </div>
    </div>
    </div>
</div>
