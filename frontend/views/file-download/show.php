<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-28 16:01:14
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label'=>'资料下载','url'=>['file-download/index']];
$this->params['breadcrumbs'][] = ['label'=>$this->title];


?>       
<div class="container ">
	<div class="container-left f-l">
    	<?php echo $this->render('/layouts/_breadcrumbs'); ?>
        <div class="detail-nr m-t-20">
            <div class="xq-bt"><?= $model->title; ?></div>
            <div class="time"><span>时间: <?= common\components\Utils::dateFormat($model->created_at, 5); ?></span><span>来源：宇斌教育</span><span>阅读数：<?= $model->views; ?>人</span></div>
            <div class="nr-hg">
            	<?= $model->filepath; ?>
            </div>
        </div>
     </div>
     <div class="container-right f-r">
    	<?php echo $this->render('/layouts/_pr_zhentifabu'); ?>
        <?php echo $this->render('/layouts/_pr_zhaopin'); ?>
     </div>
     <div class="clear"></div>
</div>