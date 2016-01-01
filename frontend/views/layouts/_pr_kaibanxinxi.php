<?php
/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-30 17:47:31
 */
?>
<div class="kbxx-list">
    <div class="kbxx-list-tit lm-tb"><span><a href="<?= Yii::$app->urlManager->createUrl(['news/index','cid'=>6]); ?>">更多</a></span>开班信息</div>	
    <div class="kbxx-list-img"><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/kbxx.gif" width="345" height="103" alt=""/></div>
    <ul class="kbxx-list-nr">
        <?php 
            $kaibanxinxi = \common\models\News::getNews(8, 8);
            foreach($kaibanxinxi as $k=>$v){
        ?>
        <li><a href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$v->id]); ?>"><?= $v->title; ?></a></li>
        <?php } ?>
    </ul>
</div>