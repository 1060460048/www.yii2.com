<?php
/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-30 17:47:31
 */
?>
<div class="zxzp-list">
    <div class="zxqz-tit lm-tb"><span><a href="<?= Yii::$app->urlManager->createUrl(['jianli/index']); ?>">更多</a></span>最新求职</div>
    <ul class="zxzp-nr">
        <?php 
            //读取求职信息
            $jianli = common\models\Jianli::find()->orderBy(['id'=>SORT_DESC])->limit(11)->all();
            ?>
            <?php foreach ($jianli as $k => $v): ?>
            <li><a href="<?= Yii::$app->urlManager->createUrl(['jianli/show','id'=>$v->id]); ?>"><span><?= common\components\Utils::dateFormat($v->created_at,0); ?></span>
        	    <label class="zx-fl">[求职]</label>
                    <?= $v->xingming; ?>
       	    <label class="zx-m-f-l">应聘</label>
            <label class="zx-ys"><?= $v->yingpingzhiwei; ?></label>
        	</a></li>
            <?php endforeach; ?>
    </ul>	
</div>