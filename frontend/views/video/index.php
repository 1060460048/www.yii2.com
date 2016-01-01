<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-28 15:53:59
 */
$this->title = "网络试听";
$this->params['breadcrumbs'] = ['label'=>$this->title];
?>
<div class="container ">
	<div class="container-left f-l">
    	<?php echo $this->render('/layouts/_breadcrumbs'); ?>
        <?php foreach ($models as $k => $v): ?>
        <div class="wlst-list f-l<?php if(($k+3)%2 == 0){echo " m-lr-30";} ?>">
            <a href="<?= Yii::$app->urlManager->createUrl(['video/show','id'=>$v->id]); ?>">
                <div class="wlst-list-sp"><img src="<?= $v->content."?vframe/jpg/offset/".$v->thumb; ?>" width="265" height="177" alt=""/></div>
                <div class="wlst-list-nr">
                  <div class="wlst-list-nr-tit"><span>
                  <input type="button" class="wlst-btn" value="网络试听">
                      </span><?= $v->title; ?></div>
                </div>
            </a> 
        </div>
        <?php endforeach; ?>

        <div class="clear"></div>
        <?php echo $this->render('/layouts/_pagination',['pagination'=>$pagination]); ?>
     </div>
     <div class="container-right f-r">
    	<?php echo $this->render('/layouts/_pr_kaibanxinxi'); ?>
        <?php echo $this->render('/layouts/_pr_baokaozhinan'); ?>
     </div>
     <div class="clear"></div>
</div>
