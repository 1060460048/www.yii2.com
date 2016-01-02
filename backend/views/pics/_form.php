<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pics */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pics-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'type')->dropDownList($model->types()) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intro')->textArea() ?>

    <?= $form->field($model, 'duty')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'content')->widget('kucha\ueditor\UEditor',[]); ?>
    <?= $form->field($model, 'views')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList(\common\models\Status::labels()) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php 
$js = <<< JS
$("#pics-type").change(function(){
    var type = $(this).val();
    set(type);
});
var type = $("#pics-type").val();
set(type);        
function set(type){
    if(type == 0){
        $(".field-pics-name").show();
        $(".field-pics-intro").show();
        $(".field-pics-duty").show();
    }else if(type == 1){
        $(".field-pics-name").show();
        $(".field-pics-intro").hide();
        $(".field-pics-duty").hide();
    }else if(type == 2 || type == 3){
        $(".field-pics-name").hide();
        $(".field-pics-intro").show();
        $(".field-pics-duty").hide();
    }
}
JS;
$this->registerJs($js);
?>