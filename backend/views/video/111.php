<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-29 13:15:01
 */
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
    uptoken_url: "/backend/web/test/uptoken",
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
            $('#success').show();
        },
        'FileUploaded': function(up, file, info) {
            var progress = new FileProgress(file, 'fsUploadProgress');
            progress.setComplete(up, info);
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
<div id="container" style="position: relative;">
    <a class="btn btn-default btn-lg " id="pickfiles" href="#" style="position: relative; z-index: 1;">
        <i class="glyphicon glyphicon-plus"></i>
        <span>选择文件</span>
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
            <th class="col-md-4">Filename</th>
            <th class="col-md-2">Size</th>
            <th class="col-md-6">Detail</th>
          </tr>
        </thead>
        <tbody id="fsUploadProgress">
        </tbody>
    </table>
</div>



