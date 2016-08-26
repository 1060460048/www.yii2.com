<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model common\models\Ads */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ads-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'place')->dropDownList($model->place()) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <?php if(!$model->isNewRecord){echo Html::img($model->thumb,['style'=>'width:80px;height:80px;']);} ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'intro')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_time')->widget(DateTimePicker::classname(), [
            'options' => ['placeholder' => '开始时间'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd hh:ii'
            ]
        ]);  ?>
    <?= $form->field($model, 'end_time')->widget(DateTimePicker::classname(), [
            'options' => ['placeholder' => '到期时间'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd hh:ii'
            ]
        ]);  ?>
    <?php echo $form->field($model, 'status')->dropDownList(['1'=>'启用','0'=>'禁用']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
