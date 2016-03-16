<?php
use common\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::get(0, Category::find()->asArray()->all()), 'id', 'label')) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'imageFile')->fileInput() ?>
    <?php if(!$model->isNewRecord){echo Html::img($model->thumb,['style'=>'width:80px;height:80px;']);} ?>

    <?php //$form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'intro')->textarea(['rows' => 6]) ?>

   
    <?= $form->field($model, 'content')->widget('kucha\ueditor\UEditor',[]); ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(\common\models\Status::labels()) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
