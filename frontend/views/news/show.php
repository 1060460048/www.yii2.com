<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-24 11:07:25
 */
$this->registerCssFile('@web/statics/css/style.css',['depends'=>['frontend\assets\AppAsset']]);

use common\models\Category;

$this->title = $model->title;
$breadcrumbs = Category::getBreadcrumbs($model->category_id, "news/index", "cid");
$this->params['breadcrumbs'] = $breadcrumbs;
?>
<?php echo $this->render('/layouts/_breadcrumbs'); ?>  
<div class="wrapper">
	<div class="wrapper-news-l">
        <div class="wrapper-news-l-body margin-bottom25">
            <div class="article-title">
                <h4 class="margin-top20"><?= $model->title; ?></h4>
                <div class="article-fb"><span class="see">(<?= $model->views; ?>)</span><span>作者：<?= $model->author; ?></span><span>时间：<?= date("Y.m.d",$model->created_at); ?></span>
                    <div class="bshare-custom fl"><div class="bsPromo bsPromo2"></div><a title="分享到QQ空间" class="bshare-qzone"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="分享到微信" class="bshare-weixin" href="javascript:void(0);"></a></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=1&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script></div>	
            </div>
            <div class="article-con">
                <?= $model->content; ?>			
            </div>
            <div class="top-bottom">
                <?php if(!$prev){echo "上一篇：暂无";}else{ ?><a class="on" href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$prev->id]); ?>"><?= "上一篇：".$prev->title; ?></a><?php } ?>
                <?php if(!$next){echo "下一篇：暂无";}else{ ?><a href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$next->id]); ?>"><?= "下一篇：".$next->title; ?></a><?php } ?>


            </div>
            <div class="tuijian-xinwen">
              <div class="tuijian-xinwen-tit">推荐新闻</div>
               <ul class="tuijian-xinwen-nr">
                   <?php 
                   $hotNews = \common\models\News::find()->where(['and','status='.\common\models\Status::STATUS_REC])->orderBy(['id'=>SORT_DESC])->limit(4)->all();
                   foreach ($hotNews as $k => $v) {

                   ?>
                    <li class="margin-right20">
                        <a href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$v->id]); ?>"><?= $v->title; ?></a>
                    </li>
                   <?php } ?>
               </ul>
            </div>
        </div>
    </div>
    <?= $this->render('/layouts/_page_right'); ?>
    <div class="cl"></div>
</div>
