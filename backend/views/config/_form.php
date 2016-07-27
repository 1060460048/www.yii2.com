<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Config */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="config-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sitename')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'beianhao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tongji')->textarea(['rows' => 6,'placeholder'=>'可以把第三方获取的统计代码贴在这里']) ?>


    <?php echo $form->field($model, 'n1')->textarea(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'n2')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'n3')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'n4')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'n5')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'n6')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'n7')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'n8')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
