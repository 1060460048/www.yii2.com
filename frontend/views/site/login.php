<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2016-3-7 15:27:14
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\captcha\Captcha;

$this->title = "登录";
$this->registerCssFile('@web/statics/css/user.css',['depends'=>['frontend\assets\AppAsset']]);
?>
<!--登录主体-->
<div class="wrapper">
    <div class="login-body">
    	<div class="login-body-bd">
        	<div class="login-body-bd-tit">用户登录</div>
        	<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            	<div class="login-zh">账号：
                    <?= Html::activeTextInput($model, 'username',['class'=>'user-text','placeholder'=>'请输入用户名或邮箱']); ?>
                </div>
                <div class="login-mm">密码：
                    <?= Html::activePasswordInput($model, 'password',['class'=>'password-text','placeholder'=>'请输入密码']); ?>
                </div>
                <div class="yzm">验证码：
                    <?= Html::activeTextInput($model, 'captcha',['class'=>'yzm-text','placeholder'=>'请输入验证码']); ?>
                    <span class="yzm-pic">
                        <?php 
                        echo Captcha::widget([
                            'name' => 'captcha',
                             'template'=>'{image}',
                        ]);
                        ?>
                    </span>
                </div>
                <?= Html::errorSummary($model,['class'=>'regerror error-tips']); ?>
                <div class="c-login" style="margin-top:30px;"><input type="submit" class="c-login-button" value="立即登录"></div>
            <?php ActiveForm::end(); ?> 
                <div class="forget">
                    <a href="<?= Yii::$app->urlManager->createUrl(['site/reg']); ?>" class="xin">注册新账户</a>|
                    <a href="<?= Yii::$app->urlManager->createUrl(['site/request-password-reset']); ?>" class="wang">忘记密码</a>
                </div>
        </div>
    </div>
</div>
