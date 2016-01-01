<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Video */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile("@web/js/plupload.full.min.js",['depends'=>['backend\assets\AppAsset']]);
$this->registerJsFile("@web/js/qiniu.min.js",['depends'=>['backend\assets\AppAsset']]);
$this->registerJsFile("@web/js/ui.js",['depends'=>['backend\assets\AppAsset']]);
$js = <<< JS
     
var uploader = Qiniu.uploader({
    runtimes: 'html5,flash,html4',
    browse_button: 'pickfiles',
    container: 'container',
    drop_element: 'container',
    max_file_size: '1000mb',
    flash_swf_url: '/backend/web/js/Moxie.swf',
    dragdrop: true,
    chunk_size: '4mb',
    uptoken_url: "/backend/web/video/uptoken",
    domain: "http://7xpdu5.com1.z0.glb.clouddn.com/",
    get_new_uptoken: false,
    // downtoken_url: '/downtoken',
    // unique_names: true,
    // save_key: true,
    // x_vars: {
    //     'id': '1234',
    //     'time': function(up, file) {
    //         var time = (new Date()).getTime();
    //         // do something with 'time'
    //         return time;
    //     },
    // },
    auto_start: true,
    init: {
        'FilesAdded': function(up, files) {
            $('table').show();
            $('#success').hide();
            plupload.each(files, function(file) {
                var progress = new FileProgress(file, 'fsUploadProgress');
                progress.setStatus("等待...");
                progress.bindUploadCancel(up);
            });
        },
        'BeforeUpload': function(up, file) {
            var progress = new FileProgress(file, 'fsUploadProgress');
            var chunk_size = plupload.parseSize(this.getOption('chunk_size'));
            if (up.runtime === 'html5' && chunk_size) {
                progress.setChunkProgess(chunk_size);
            }
        },
        'UploadProgress': function(up, file) {
            var progress = new FileProgress(file, 'fsUploadProgress');
            var chunk_size = plupload.parseSize(this.getOption('chunk_size'));
            progress.setProgress(file.percent + "%", file.speed, chunk_size);
        },
        'UploadComplete': function() {
            //$('#success').show();
        },
        'FileUploaded': function(up, file, info) {
            var progress = new FileProgress(file, 'fsUploadProgress');
            progress.setComplete(up, info);
            var domain = up.getOption('domain');
            var res = $.parseJSON(info);
            var sourceLink = domain + res.key; //获取上传成功后的文件的Url
            $("#video-content").val(sourceLink);
        },
        'Error': function(up, err, errTip) {
            $('table').show();
            var progress = new FileProgress(err.file, 'fsUploadProgress');
            progress.setError();
            progress.setStatus(errTip);
        }
            // ,
            // 'Key': function(up, file) {
            //     var key = "";
            //     // do something with key
            //     return key
            // }
    }
});        
        

JS;
$this->registerJs($js);

?>

<div class="video-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thumb')->textInput(['maxlength' => true])->label('输入数字，如需要第5秒的视频作为封面截图，就输入5'); ?>

    <?php //echo $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>
    <div id="container" style="position: relative;">
    <a class="btn btn-default btn-lg " id="pickfiles" href="#" style="position: relative; z-index: 1;">
        <i class="glyphicon glyphicon-plus"></i>
        <span>上传视频文件</span>
    </a>
</div>
<div style="display:none" id="success" class="col-md-12">
    <div class="alert-success">
        队列全部文件处理完毕
    </div>
</div>
<div class="col-md-12 ">
    <table class="table table-striped table-hover text-left" style="margin-top:40px;display:none">
        <thead>
          <tr>
            <th class="col-md-4">文件名</th>
            <th class="col-md-2">大小</th>
            <th class="col-md-6">详情</th>
          </tr>
        </thead>
        <style>#fsUploadProgress img{width:50px;height:50px;}</style>
        <tbody id="fsUploadProgress">
        </tbody>
    </table>
</div>
    <?= $form->field($model, 'content')->hiddenInput()->label(false); ?>

    <?php //echo $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(common\models\Status::labels()) ?>

    <?= $form->field($model, 'views')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
