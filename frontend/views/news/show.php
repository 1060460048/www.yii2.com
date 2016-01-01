<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-24 11:07:25
 */
use common\models\Category;

$this->title = $model->title;
$breadcrumbs = Category::getBreadcrumbs($model->category_id, "news/index", "cid");
$this->params['breadcrumbs'] = $breadcrumbs;
?>
<div class="container ">
	<div class="container-left f-l">
      <?php echo $this->render('/layouts/_breadcrumbs'); ?>
      <div class="detail-nr m-t-20">
          <div class="xq-bt"><?= $model->title; ?></div>
          <div class="time"><span>时间: <?= \common\components\Utils::dateFormat($model->created_at, 4); ?></span><span>来源：<?= $model->author?$model->author:'管理员'; ?></span><span>阅读数：<?= $model->views; ?>人</span></div>
            <div class="nr-hg">
            	<?= $model->content; ?>

            </div>
            <div class="xian m-t-20"></div>
            <div class="zp-detail"><label class="fany">上一篇：</label>
                <?php if($prev){ ?>
                <a href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$prev->id]); ?>"><?= $prev->title; ?></a>
                <?php }else{ echo "暂无";} ?>
            </div>
        <div class="zp-detail"><label class="fany">下一篇：</label>
            <?php if($next){ ?>
            <a href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$next->id]); ?>"><?= $next->title; ?></a>
            <?php }else{ echo "暂无";} ?>
        </div> 
            <div class="fhlb"><a href="<?= Yii::$app->urlManager->createUrl(['news/index','cid'=>$model->category_id]); ?>">返回列表</a></div> 
      </div>
        <div class="clear"></div>
        
     </div>
     <div class="container-right f-r">
    	<?php echo $this->render('/layouts/_pr_zhentifabu'); ?>
        <?php echo $this->render('/layouts/_pr_baokaozhinan'); ?>
     </div>
     <div class="clear"></div>
</div>

