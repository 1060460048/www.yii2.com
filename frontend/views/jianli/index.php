<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-28 15:53:59
 */
$this->title = "简历列表";
$this->params['breadcrumbs'] = ['label'=>'最新简历'];
?>
<div class="container ">
	<div class="container-left f-l">
    	<?php echo $this->render('/layouts/_breadcrumbs'); ?>
        <ul class="zxzp-list">
            <?php foreach ($models as $k => $v): ?>
            
            <li><a href="<?= Yii::$app->urlManager->createUrl(['jianli/show','id'=>$v->id]); ?>"><span><?= common\components\Utils::dateFormat($v->created_at, 0); ?></span>
        	    <label class="zx-fl" >[求职]</label>
                    <?= $v->xingming; ?>
       	    <label class="zx-m-f-l">应聘</label>
            <label class="zx-ys"><?= $v->yingpingzhiwei; ?></label>
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
