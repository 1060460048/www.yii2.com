<?php
/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-28 13:01:26
 */
$this->title = "师生风采";
$this->params['breadcrumbs'] = ['label'=>'师生风采'];
?>
<div class="container ">
	<div class="container-left f-l">
    	<?php echo $this->render('/layouts/_breadcrumbs'); ?>
        <ul class="ssfc">
            <?php foreach ($models as $k => $v): ?>           
            <li><a href="<?= Yii::$app->urlManager->createUrl(['album/show','id'=>$v->id]); ?>"><img src="<?= $v->thumb; ?>"></a></li>
            <?php endforeach; ?>
            
        </ul>
        <div class="clear"></div>
        <?php echo $this->render('/layouts/_pagination',['pagination'=>$pagination]); ?>
    </div>
    <div class="container-right f-r">
        <?php echo $this->render('/layouts/_pr_kaibanxinxi'); ?>
        <?php echo $this->render('/layouts/_pr_baokaozhinan'); ?>
    </div>
    <div class="clear"></div>
    </div>
