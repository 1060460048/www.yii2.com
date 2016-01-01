<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JobsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jobs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'company_id') ?>

    <?= $form->field($model, 'zhiweiming') ?>

    <?= $form->field($model, 'gongzuodiqu') ?>

    <?= $form->field($model, 'zhiweixinzi') ?>

    <?php // echo $form->field($model, 'xueliyaoqiu') ?>

    <?php // echo $form->field($model, 'zhaopinrenshu') ?>

    <?php // echo $form->field($model, 'gongzuoxingzhi') ?>

    <?php // echo $form->field($model, 'xingbieyaoqiu') ?>

    <?php // echo $form->field($model, 'gongzuojingyan') ?>

    <?php // echo $form->field($model, 'jingzhengyoushi') ?>

    <?php // echo $form->field($model, 'zhiweimiaoshu') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
