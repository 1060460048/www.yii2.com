<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2016-3-14 22:56:14
 */
use yii\helpers\Html;
$this->title = "修改密码";
$this->registerCssFile('@web/statics/css/user.css',['depends'=>['frontend\assets\AppAsset']]);
?>
<div class="wrapper">
  <?= $this->render("_left"); ?>
    <div class="wrapper-user-r">
        <div class="paaawordbody">
            <?php $form = yii\widgets\ActiveForm::begin(['id' => 'form-signup']); ?>
            <div class="paaawordbody-ymm margin-bottom33">
                原密码：
                
                <input type="password" name='oldpass' class="ymm-txt">
            </div>
            <div class="paaawordbody-ymm margin-bottom33">
                新密码：
                <input type="password" name='password' class="ymm-txt">
            </div>
            <div class="paaawordbody-zcsr margin-bottom33">
                再次输入：
                <input type="password" name='repassword' class="ymm-txt">
            </div>
            <div class="paaawordbody-zcsr-xgmm">
                <input type="submit" value="修改密码">
            </div>
            <?php yii\widgets\ActiveForm::end(); ?>
        </div>
    </div>
    <div class="cl"></div>
</div>
