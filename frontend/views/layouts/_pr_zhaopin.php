<?php
/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-30 17:47:31
 */
?>
<div class="zxzp-list">
    <div class="zxqz-tit lm-tb"><span><a href="<?= Yii::$app->urlManager->createUrl(['jianli/index']); ?>">更多</a></span>最新招聘</div>
    <ul class="zxzp-nr">
        <?php 
            //读取求职信息
            $jobs = common\models\Jobs::find()->orderBy(['id'=>SORT_DESC])->limit(11)->all();
            ?>
            <?php foreach ($jobs as $k => $v): ?>
            <li><a href="<?= Yii::$app->urlManager->createUrl(['job/show','id'=>$v->id]); ?>"><span><?= common\components\Utils::dateFormat($v->created_at,0); ?></span>
        	    <label class="zx-fl">[招聘]</label>
                    <?= $v->company->name; ?>
       	    <label class="zx-m-f-l">招聘</label>
            <label class="zx-ys"><?= $v->zhiweiming; ?></label>
        	</a></li>
            <?php endforeach; ?>
    </ul>	
</div>