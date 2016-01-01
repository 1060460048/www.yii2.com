<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-28 15:53:59
 */
$this->title = "招聘信息";
$this->params['breadcrumbs'] = ['label'=>'最新招聘'];
?>
<div class="container ">
	<div class="container-left f-l">
    	<?php echo $this->render('/layouts/_breadcrumbs'); ?>
        <ul class="zxzp-list">
            <?php foreach ($models as $k => $v): ?>
            
            <li><a href="<?= Yii::$app->urlManager->createUrl(['job/show','id'=>$v->id]); ?>"><span><?= common\components\Utils::dateFormat($v->created_at, 0); ?></span>
        	    <label class="zx-fl" >[招聘]</label>
                    <?= $v->company->name; ?>
       	    <label class="zx-m-f-l">诚招</label>
            <label class="zx-ys"><?= $v->zhiweiming; ?></label>
        	</a></li>
            <?php endforeach; ?>
        </ul>
        <div class="clear"></div>
        <?php echo $this->render('/layouts/_pagination',['pagination'=>$pagination]); ?>
     </div>
     <div class="container-right f-r">
        <?php echo $this->render('/layouts/_pr_kaibanxinxi'); ?>
        <?php echo $this->render('/layouts/_pr_qiuzhi'); ?>
     </div>
     <div class="clear"></div>
</div>
