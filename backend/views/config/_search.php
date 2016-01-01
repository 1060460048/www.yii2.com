<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ConfigSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="config-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sitename') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'keywords') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'beianhao') ?>

    <?php // echo $form->field($model, 'tongji') ?>

    <?php // echo $form->field($model, 'n1') ?>

    <?php // echo $form->field($model, 'n2') ?>

    <?php // echo $form->field($model, 'n3') ?>

    <?php // echo $form->field($model, 'n4') ?>

    <?php // echo $form->field($model, 'n5') ?>

    <?php // echo $form->field($model, 'n6') ?>

    <?php // echo $form->field($model, 'n7') ?>

    <?php // echo $form->field($model, 'n8') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
