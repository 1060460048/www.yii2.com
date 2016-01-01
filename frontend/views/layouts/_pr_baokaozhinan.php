<?php
/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-30 17:47:31
 */
?>
<div class="rmzt">
    <div class="rmzt-tit lm-tb"><span><a href="<?= Yii::$app->urlManager->createUrl(['news/index','cid'=>8]); ?>">更多</a></span>报考指南</div>	
    <div><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_55.jpg" width="280" height="104" alt="" /></div>
    <ul class="kbxx-nr">
        <?php 
            $baokaozhinan = \common\models\News::getNews(8, 8);
            foreach($baokaozhinan as $k=>$v){
        ?>
        <li><a href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$v->id]); ?>"><?= $v->title; ?></a></li>
        <?php } ?>
    </ul>	
</div>