<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Resource */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resource-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'type')->dropDownList(Yii::$app->params['resource']); ?>
    <?= $form->field($model, 'class')->dropDownList(Yii::$app->params['class']) ?>

    <?= $form->field($model, 'course')->dropDownList(Yii::$app->params['course']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'imageFile')->fileInput() ?>
    <?php if(!$model->isNewRecord){echo Html::img($model->thumb,['style'=>'width:80px;height:80px;']);} ?>

    <?= $form->field($model, 'keyword')->textarea(['maxlength' => true]) ?>

     <?= $form->field($model, 'content')->widget('kucha\ueditor\UEditor',[]); ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(\common\models\Status::labels()) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
