<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2016-3-14 22:53:13
 */
$this->title = '修改用户资料';
$this->registerCssFile('@web/statics/css/user.css',['depends'=>['frontend\assets\AppAsset']]);
?>
<!--主体开始-->
<div class="wrapper">
    <?= $this->render("_left"); ?>
    <div class="wrapper-user-r">
     	<div class="user-r-sc margin-bottom25"><img src="/statics/images/img_126.jpg" width="103" height="85" alt=""/><a href="#">上传头像</a> </div>
        <div class="user-r-body">
        	<form>
           	  <div class="user-r-yhm margin-bottom20">用户名：<input type="text" class="user-r-text"></div>
                <div class="user-r-xb margin-bottom20">性别：
                  
                    <label>
                      <input type="radio" name="RadioGroup1" value="男" id="RadioGroup1_0">
                      男</label>
                    <label>
                      <input type="radio" name="RadioGroup1" value="女" id="RadioGroup1_1">
                      女</label>

                </div>
                <div class="user-r-zs margin-bottom20">真实姓名：<input type="text" class="user-r-text"></div>
                <div class="user-r-yx margin-bottom20">邮箱：<input type="text" class="user-r-text"></div>
                <div class="user-r-sj margin-bottom20">手机：<input type="text" class="user-r-text"></div>
                <div class="user-r-dz margin-bottom33">地址：<input type="text" class="user-r-dz-text"></div>
                <div class="user-r-bcxx"><input type="submit" value="保存信息"></div>
            </form>
        </div>
    </div>
    <div class="cl"></div>
</div>
