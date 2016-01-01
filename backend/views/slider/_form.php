<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Slider;
/* @var $this yii\web\View */
/* @var $model common\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'place')->dropDownList(Slider::places()) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <?php //= $form->field($model, 'thumb')->hiddenInput() ?>

    <?= $form->field($model, 'intro')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'ord')->textInput(['placeholder'=>'数字越大排序越靠前,无特殊排序需求可留空']) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
