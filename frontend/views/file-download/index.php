<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-28 15:53:59
 */
$this->title = "资料下载";
$this->params['breadcrumbs'] = ['label'=>$this->title];
?>
<div class="container ">
	<div class="container-left f-l">
    	<?php echo $this->render('/layouts/_breadcrumbs'); ?>
        <ul class="zlxz-list">
            <?php foreach ($models as $k => $v): ?>
            
            <li><a href="<?= Yii::$app->urlManager->createUrl(['file-download/show','id'=>$v->id]); ?>"><span><?= common\components\Utils::dateFormat($v->created_at, 0); ?></span>
                        <?= $v->title; ?>
        	</a></li>
            <?php endforeach; ?>
        </ul>
        <div class="clear"></div>
        <?php echo $this->render('/layouts/_pagination',['pagination'=>$pagination]); ?>
     </div>
     <div class="container-right f-r">
        <?php echo $this->render('/layouts/_pr_zhentifabu'); ?>
        <?php echo $this->render('/layouts/_pr_zhaopin'); ?>
     </div>
     <div class="clear"></div>
</div>
