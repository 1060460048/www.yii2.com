<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ResourceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resource-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'class') ?>

    <?= $form->field($model, 'course') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'thumb') ?>

    <?php // echo $form->field($model, 'keyword') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'author') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'views') ?>

    <?php // echo $form->field($model, 'downtime') ?>

    <?php // echo $form->field($model, 'star') ?>

    <?php // echo $form->field($model, 'pinglunnum') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
