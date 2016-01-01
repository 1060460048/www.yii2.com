<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Jianli */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jianli-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'xingming')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'xingbie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nianling')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'xueli')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'xiangguanzhengshu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'yingpingzhiwei')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qiwangxinzi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gerenjianjie')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'qitayaoqiu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lianxidianhua')->textInput(['maxlength' => true]) ?>

   
    <?php // $form->field($model, 'end_at')->textInput() ?>

    <?= $form->field($model, 'views')->textInput() ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true,'value'=>'宇斌教育']) ?>

    <?php //echo $form->field($model, 'jobtype')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
