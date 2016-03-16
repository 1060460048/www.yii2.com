<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2016-3-8 16:50:37
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerCssFile('@web/statics/css/user.css',['depends'=>['frontend\assets\AppAsset']]);

$this->title = "修改密码";
?>
<div class="wrapper">
    <div class="login-body">
    	<div class="login-body-bd">
        	<div class="login-body-bd-tit">修改密码</div>
            <div class="gai-password">
        	<?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
                <div class="gai-password-ymm margin-bottom33">
                    新密码：
                    <?= Html::activePasswordInput($model, 'password',['autofocus' => true,'class'=>'ymm-txt','placeholder'=>'请输入新密码']); ?>
                </div>
               <div class="gai-password-zcsr margin-bottom33">
                   再次输入：
                   <?= Html::activePasswordInput($model, 'repassword',['class'=>'ymm-txt','placeholder'=>'重复新密码']); ?>
               </div>
               <div class="gai-password-zcsr-xgmm">
                   <input type="submit" value="修改密码">
               </div>
            <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
