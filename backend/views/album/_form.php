<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Album */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="album-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intro')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'views')->textInput() ?>

   
    
    <?php if (!$model->isNewRecord) { ?>
        <div class="form-group">
            <?php
            foreach ($model->images as $image) {
                echo '<div style="width:150px; float: left; text-align: center">';
                echo '<a href="' . \Yii::$app->getUrlManager()->createUrl(['album/remove', 'id' => $image->id]) . '" title="' . Yii::t('app', 'Delete') . '" data-confirm="' . Yii::t('app', 'Are you sure you want to delete this item?') . '" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a><br>';
                if (strpos($image->thumb, 'http://') === null) {
                    $file = Yii::getAlias('@frontend/web' . $image->thumb);
                    $fileType = \yii\helpers\FileHelper::getMimeType($file);
                    $data = base64_encode(file_get_contents($file));
                    echo "<img src='data:" . $fileType . ";base64," . $data . "' width=100><br>";
                } else {
                    echo "<img src='$image->thumb' width=100><br>";
                }
                echo Yii::t('app', 'Sort Order') . ' <input style="width:50px" name="imageSort[' . $image->id . ']" value="' . $image->sort_order . '">';
                echo '</div>';
            } ?>
            <div style="clear:both"></div>
        </div>

        <div class="form-group">
            <?= \backend\widgets\image\ImageDropzone::widget([
                'name' => 'file',
                'url' => ['uploadimage'],
                'sortable' => true,
                'sortableOptions' => [
                    //'items' => '.dz-image-preview',
                ],
                //'model' => $model,
                //'attribute' => 'image',
                'htmlOptions' => [
                    //'class' => 'table table-striped files',
                    //'id' => 'previews',
                ],
                'options' => [
                    //'clickable' => ".fileinput-button",
                    'params' => ['productId' => $model->id,],
                ],
            ]); ?>
        </div>

    <?php } ?>
    <div>
        <?= Html::errorSummary($model); ?>
        
    </div>
    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
