<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2016-3-8 11:24:09
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;


$this->title = "注册";
$this->registerCssFile('@web/statics/css/user.css',['depends'=>['frontend\assets\AppAsset']]);
?>
<!--登录主体-->
<div class="wrapper">
    <div class="login-body">
    	<div class="register-body-bd">
        	<div class="login-body-bd-tit">用户注册</div>
        	<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            	<div class="login-zh">
                    <span>手机：</span>
                    <?= Html::activeTextInput($model, 'phone',['autofocus' => true,'class'=>'user-text','placeholder'=>'请输入手机号']); ?>
                </div>
            	<div class="login-zh">
                    <span>邮箱：</span>
                    <?= Html::activeTextInput($model, 'email',['class'=>'user-text','placeholder'=>'请输入邮箱']); ?>
                </div>
                <div class="login-nc">
                    <span>昵称：</span>
                    <?= Html::activeTextInput($model, 'username',['class'=>'user-text','placeholder'=>'请输入昵称']); ?>
                </div>
                <div class="login-zs">
                    <span>真实姓名：</span>
                    <?= Html::activeTextInput($model, 'truename',['class'=>'user-text','placeholder'=>'请输入您的真实姓名']); ?>
                </div>
                <div class="login-mm">
                    <span>密码：</span>
                    <?= Html::activePasswordInput($model, 'password',['class'=>'password-text','placeholder'=>'请输入密码']); ?>                    
                </div>
                <div class="yzm">
                    <span>验证码：</span>
                    <?= Html::activeTextInput($model, 'captcha',['class'=>'yzm-text','placeholder'=>'请输入右侧验证码']); ?>
                    <i class="yzm-pic">
                        <?php 
                        echo Captcha::widget([
                            'name' => 'captcha',
                             'template'=>'{image}',
                        ]);
                        ?>
                    </i>
                </div>
                <?= Html::errorSummary($model,['class'=>'regerror error-tips']); ?>
                <!--<div class="agree"><input type="checkbox">我已经同意<i>《简扬教育用户中心》</i></div>-->
                
                
                
                
                <div class="c-login" style="margin-top:20px;">
                    <input type="submit" class="c-login-button" value="快速注册">
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

            