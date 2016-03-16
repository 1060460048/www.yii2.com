<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pinglun */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pinglun-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'star')->textInput() ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'type')->dropDownList(Yii::$app->params['type']); ?>

    <?= $form->field($model, 'rid')->hiddenInput()->label(false); ?>

   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
