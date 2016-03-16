<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2016-3-14 22:58:59
 */
$this->registerJsFile("@web/backend/web/js/plupload.full.min.js");//['f'=>['frontend\assets\BootstrapAsset']]);

$this->registerCssFile('@web/statics/css/user.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile("@web/backend/web/js/plupload.full.min.js");//['depends'=>['frontend\assets\BootstrapAsset']]);
$this->registerJsFile("@web/backend/web/js/qiniu.min.js");//,['depends'=>['frontend\assets\BootstrapAsset']]);
$this->registerJsFile("@web/backend/web/js/ui.js");//['depends'=>['frontend\assets\BootstrapAsset']]);

$this->title = "上传视频";

?>

<div class="wrapper">
    <?= $this->render("_left"); ?>
    <div class="wrapper-user-r">
  	
        
        <div class="myvideo margin-bottom33">

            
        <?php $form = yii\widgets\ActiveForm::begin(); ?>  
   	  
        <?= yii\helpers\Html::activeHiddenInput($model, 'video'); ?>
      <div class="myvideo-xz margin-bottom25">
          <span>标题：</span>
          <?= yii\helpers\Html::activeTextInput($model, 'title'); ?>
 
      </div>
      <div class="myvideo-kcts margin-bottom25">
          <span>简介：</span>
          <?= yii\helpers\Html::activeTextarea($model, 'keyword'); ?>
      </div>
        <div class="myvideo-xz margin-bottom25">
          <span>年级：</span>
          <?= yii\helpers\Html::activeDropDownList($model,'class',Yii::$app->params['class']); ?>
          
        </div>
      <div class="myvideo-xz margin-bottom25">
          <span>科目：</span>
          <?= yii\helpers\Html::activeDropDownList($model,'class',Yii::$app->params['course']); ?>
      </div>
      
            <link href="/statics/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <style>
                *{
                -webkit-box-sizing: content-box; 
                -moz-box-sizing:content-box;
                /*//box-sizing: border-box*/
                box-sizing:content-box;
                }
            </style>
            <div id="viodeup">
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
          
        </div><!-- end video up -->
            
            
      <div><?= $form->field($model, 'content')->widget('kucha\ueditor\UEditor',[]); ?></div>
      
      
      
      
      <div class="myvideo-bcxx"><input type="submit" value="保存信息"></div>
      <?php yii\widgets\ActiveForm::end(); ?>
    </div>
   	
  </div>
    <div class="cl"></div>
</div>
<?php 
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
    uptoken_url: "/user/uptoken",
    domain: "http://7xrqfk.com1.z0.glb.clouddn.com/",
    get_new_uptoken: false,
//    filters : {
//            max_file_size : '300mb',
//            prevent_duplicates: true,
//            //Specify what files to browse for
//            mime_types: [
//                {title : "flv files", extensions : "flv"} //限定flv后缀上传格式上传
//                {title : "Video files", extensions : "flv,mpg,mpeg,avi,wmv,mov,asf,rm,rmvb,mkv,m4v,mp4"}, //限定flv,mpg,mpeg,avi,wmv,mov,asf,rm,rmvb,mkv,m4v,mp4后缀格式上传
//
//            ]
//        },
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
            $("#video-video").val(sourceLink);
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
