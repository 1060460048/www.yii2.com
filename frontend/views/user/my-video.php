
<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2016-3-14 22:58:59
 */
$this->title = "我上传的内容";
$this->registerCssFile('@web/statics/css/user.css',['depends'=>['frontend\assets\AppAsset']]);
?>
<div class="wrapper">
    <?= $this->render("_left"); ?>
  <div class="wrapper-user-r">
  	
   	<div class="c-classbody margin-bottom50">
        <div class="c-classbody-tit">我的上传  | <a href="<?= Yii::$app->urlManager->createUrl(['user/upload-video']); ?>">上传视频</a></div>
            <ul class="c-classbody-body">
                <?php foreach ($models as $k => $v): ?>
            	<li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['resource/video','u'=>$v->url]); ?>">
                        <img src="<?= $v->video."?vframe/jpg/offset/".$v->thumb; ?>" width="247" height="139" alt=""/>
                        <br/><?= $v->title; ?>
                    </a>
                </li>
                <?php endforeach; ?>
               
            </ul>
            <div style="clear:both;"></div>
             <?php echo $this->render('/layouts/_pagination',['pagination'=>$pagination]); ?>
    </div>
  </div>
    <div class="cl"></div>
</div>
