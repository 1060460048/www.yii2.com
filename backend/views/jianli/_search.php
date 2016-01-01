<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JianliSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jianli-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'xingming') ?>

    <?= $form->field($model, 'xingbie') ?>

    <?= $form->field($model, 'nianling') ?>

    <?= $form->field($model, 'xueli') ?>

    <?php // echo $form->field($model, 'xiangguanzhengshu') ?>

    <?php // echo $form->field($model, 'yingpingzhiwei') ?>

    <?php // echo $form->field($model, 'qiwangxinzi') ?>

    <?php // echo $form->field($model, 'gerenjianjie') ?>

    <?php // echo $form->field($model, 'qitayaoqiu') ?>

    <?php // echo $form->field($model, 'lianxidianhua') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'end_at') ?>

    <?php // echo $form->field($model, 'views') ?>

    <?php // echo $form->field($model, 'author') ?>

    <?php // echo $form->field($model, 'jobtype') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
