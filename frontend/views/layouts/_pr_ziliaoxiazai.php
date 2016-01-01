<?php
/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-30 17:47:31
 */
?>
<div class="rmzt">
    <div class="rmzt-tit lm-tb"><span><a href="<?= Yii::$app->urlManager->createUrl(['file-download/index']); ?>">更多</a></span>资料下载</div>	
    <div><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_58.jpg" width="286" height="101" alt=""/></div>
    <ul class="kbxx-nr">
        <?php 
            $wenjian = \common\models\FileDownload::find()->orderBy(['created_at'=>SORT_DESC])->limit(5)->all();
            foreach($wenjian as $k=>$v){
        ?>
        <li><a href="<?= Yii::$app->urlManager->createUrl(['file-download/index','id'=>$v->id]); ?>"><?= $v->title; ?></a></li>
        <?php } ?>
    </ul>	
</div>  