<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-26 17:58:01
 */
use common\models\Category;

$this->title = "列表_".Category::getCategoryName($cid);
$breadcrumbs = Category::getBreadcrumbs($cid, "news/index", "cid");
$this->params['breadcrumbs'] = $breadcrumbs;
?>
<div class="container ">
	<div class="container-left f-l">
        <?php echo $this->render('/layouts/_breadcrumbs'); ?>       
        <ul class="zxzx">
        <?php foreach ($models as $k => $v): ?>
            <li>
                <div class="zxzx-zt">
                    <div class="zxzx-zt-tit"><a href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$v->id]); ?>"><?= $v->title; ?></a></div>
                    <div class="zxzx-zt-fb"><span class="ly"><?= $v->author; ?></span><span class="gs">宇斌造价</span><span class="sj"><?= \common\components\Utils::dateFormat($v->created_at, 0); ?></span><span class="ll"><?= $v->views; ?></span></div>
                    <div class="zxzx-zt-nr">
                        <a href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$v->id]); ?>"><?= $v->intro; ?></a>
                    </div>
                </div>
                <div class="zxzx-tp"><img src="<?= $v->thumb; ?>" width="174" height="133"></div>
           </li>
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