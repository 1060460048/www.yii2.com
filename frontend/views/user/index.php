<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2016-3-15 10:58:32
 */

$this->title = '用户中心';
$this->registerCssFile('@web/statics/css/user.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/statics/js/jquery.ajaxfileupload.js',['depends'=>['frontend\assets\AppAsset']]);
?>
<!--主体开始-->
<div class="wrapper">
    <?= $this->render("_left"); ?>
    <div class="wrapper-user-r">
     	<div class="user-r-sc margin-bottom25">
            <img id="user-head" src="<?= Yii::$app->user->identity->avatar; ?>" width="103" height="85" alt="" />
            <a href="javascript:void(0);" id="upload">修改头像</a>
            <input style="display:none;" type="file" name="User[file]" id="upload-btn">
        </div>
       
        <div class="user-r-body" style="padding-left: 250px;height: 450px;">
                <div class="user-r-yhm margin-bottom20">用户名：<?= Yii::$app->user->identity->username; ?></div>
               
                <div class="user-r-zs margin-bottom20">真实姓名：<?= Yii::$app->user->identity->truename; ?></div>
                <div class="user-r-yx margin-bottom20">邮箱：<?= Yii::$app->user->identity->email; ?></div>
                <div class="user-r-sj margin-bottom20">手机：<?= Yii::$app->user->identity->phone; ?></div>
                <!--<div class="user-r-dz margin-bottom33">地址：<?= isset(Yii::$app->user->identity->address)?Yii::$app->user->identity->address:"未填写"; ?></div>-->
                <!--<div class="user-r-bcxx"><a href="<?= Yii::$app->urlManager->createUrl(['user/basic']); ?>" class="modify">修改资料</a></div>-->
        </div>
    </div>
    <div class="cl"></div>
</div>
<?php
$url = Yii::$app->urlManager->createUrl(['user/upload-head']);
$token = Yii::$app->request->csrfToken;
$js = <<< JS
$("#upload-btn").change(function(){  
    $.ajaxFileUpload({  
        url: '{$url}',  
        secureuri: false,  
        data:{'_csrf':'{$token}'},  
        fileElementId:'upload-btn',  
        dataType: 'xml', 
        success: function (data, status) {  
            if ($(data).find("result").text() == 'Success') {  
                //上传成功
                var url = $(data).find("url").text();
                $("#user-head").attr('src',url);
                window.location.reload();
            }  
            else{  
                alert("上传失败");  
            }  
        },  
        error: function (data, status, e) {  
          return;  
        }  
    });  
});  
$("a#upload").click(function(){
  $("#upload-btn").click();
});
JS;
$this->registerJs($js);
?>