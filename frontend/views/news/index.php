<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-23 19:21:01
 */
$this->registerCssFile('@web/statics/css/style.css',['depends'=>['frontend\assets\AppAsset']]);

use common\models\Category;

$this->title = "列表_".Category::getCategoryName($cid);
$breadcrumbs = Category::getBreadcrumbs($cid, "news/index", "cid");
$this->params['breadcrumbs'] = $breadcrumbs;
//var_dump($breadcrumbs);die;
?>
<?php echo $this->render('/layouts/_breadcrumbs'); ?>      	
<div class="wrapper">
	<div class="wrapper-news-l">
      <div class="wrapper-news-l-body">
          <?php foreach ($models as $k => $v): ?>
            <div class="jyitem<?php if($k == 0){echo " margin-top20";}?>">
				<div class="leftimg fl"><a href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$v->id]); ?>"><img src="<?= $v->thumb; ?>"></a></div>
				<div class="rightfont fr">
                    <h3><a href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$v->id]); ?>"><?= $v->title; ?></a></h3>
                    <p><?= $v->intro; ?></p>
					<div class="jyoperation">
                        <span class="fl"><?= date("Y-m-d",$v->created_at); ?></span>
                        <span class="fl">阅读：（<?= $v->views; ?>）</span>
                        <span class="fl"><i><img src="/statics/images/share_4de6745.jpg"></i>分享：
						</span>
						<div class="bshare-custom"><div class="bsPromo bsPromo2"></div><a title="分享到QQ空间" class="bshare-qzone"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="分享到微信" class="bshare-weixin" href="javascript:void(0);"></a></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=1&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
					</div>
				</div>
			</div>
            <?php endforeach; ?>
           </div>
           <?php echo $this->render('/layouts/_pagination',['pagination'=>$pagination]); ?>
    </div>
    <?= $this->render('/layouts/_page_right'); ?>
    <div class="cl"></div>
</div>     