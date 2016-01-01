<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-28 16:01:14
 */
$this->registerJsFile("@web/statics/ckplayer/ckplayer.js");
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label'=>'网络试听','url'=>['video/index']];
$this->params['breadcrumbs'][] = ['label'=>$this->title];


?>
<div class="container ">
	<div class="container-left f-l">
    	<?php echo $this->render('/layouts/_breadcrumbs'); ?>
      <div class="detail-nr m-t-20">
          <div class="xq-bt"><?= $model->title; ?></div>
          <div class="time"><span>时间:<?= common\components\Utils::dateFormat($model->created_at,5); ?></span><span>来源：宇斌教育</span><span>阅读数：<?= $model->views; ?>人</span></div>
            <div class="st-nr">
            	<div class="st-video" id="video">
                    
                </div>
            </div>

           
   
            <!--<div class="st-video-key">关键词：<span>宇斌教育造价员培训 </span><span>基础课程试听</span></div>-->
            <div class="xian m-t-20"></div>
<!--         <div class="zp-detail"><label class="fany">上一篇：</label><a href="#">造价专业有前途吗</a></div>
        <div class="zp-detail"><label class="fany">下一篇：</label><a href="#">造价专业有前途吗</a></div> -->
<div class="fhlb" style="margin-top:10px;"><a href="<?= Yii::$app->urlManager->createUrl(['video/index']); ?>">返回列表</a></div> 
      </div>
        <div class="clear"></div>
        
     </div>
     <div class="container-right f-r">
        <?php echo $this->render('/layouts/_pr_ziliaoxiazai'); ?>
        <?php echo $this->render('/layouts/_pr_baokaozhinan'); ?>
     </div>
     <div class="clear"></div>
</div>
<?php 
$videoUrl = $model->content;
//$videoUrl = "http://movie.ks.js.cn/flv/other/1_0.flv";
$js = <<< JS
  
 var flashvars={
		f:'{$videoUrl}',
		c:0,
		b:1
		};
	var video=['{$videoUrl}'];
	CKobject.embed('/statics/ckplayer/ckplayer.swf','video','ckplayer_video','600','400',false,flashvars,video)	
	function closelights(){//关灯
		alert(' 本演示不支持开关灯');
	}
	function openlights(){//开灯
		alert(' 本演示不支持开关灯');
	}

        
JS;
$this->registerJs($js);

?>