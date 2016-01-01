<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Kaoshi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kaoshi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= 
        $form->field($model, 'baomingshijian')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => '选择报名时间'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]); 

    ?>
    <?= $form->field($model, 'jiezhishijian')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => '选择报名时间'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]); 
    ?>

    <?= $form->field($model, 'kaoshishijian')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => '选择报名时间'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]); 
    ?>
    <?= $form->field($model, 'ord')->textInput(['placeholder'=>'数字越小越靠前,默认可不填写']) ?>

    <?= $form->field($model, 'is_reminder')->dropDownList(['否','是']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
