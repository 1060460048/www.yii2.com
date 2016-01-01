<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?>_<?= $this->params['siteconfig']['sitename'] ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody(); ?>
<div class="top-div">
      <div class="top-div-nr">
      	   <img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_01.jpg" width="1170" height="204" alt=""/>
      </div>
</div>
<div class="header">
    <div class="header-top">
        <div class="f-l">
            <a href="/"><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_04.jpg" width="296" height="84" /></a>
        </div>
          <div class="f-r">
           <div class="search-panel">
<!--                <ul class="search-panel-li clearfix">
                    <li><a tip="fac_price" href="javascript:void(0);" class="selected">造价员</a></li>
                    <li><a tip="gov_search" href="javascript:void(0);">建造师</a></li>
                    <li><a tip="gov_search"  href="javascript:void(0);">八大员</a></li>
                    <li><a tip="fac" href="javascript:void(0);">学历教育</a></li>
                   <li><a tip="xunjia" href="javascript:void(0);">招聘信息</a></li>
                </ul>-->
                <div class="search-panel-input">
                    <form action="<?= Yii::$app->urlManager->createUrl(['search/index']); ?>" method="get">
                        <input type="text" id="key" name="key" placeholder="请输入关键字 如“ 造价员培训 ”" value="<?php if(isset($_GET['key'])){echo $_GET['key'];}; ?>" class="txt-inp" />
                        <input type="submit" class="btn-search" value="" />
                    </form>
                </div>
            </div>
          </div>
    </div>
    <ul class="mainNav clearfix">
        <li><a  href="<?= Yii::$app->urlManager->createUrl(['site/index']); ?>" class="location_z select">首页</a></li>
        <li><a  href="<?= Yii::$app->urlManager->createUrl(['news/index','cid'=>8]); ?>" class="location_z">报考指南</a></li>
        <li><a  href="<?= Yii::$app->urlManager->createUrl(['site/zaojiayuan']); ?>" class="location_z">造价员培训</a></li>
        <li><a  href="<?= Yii::$app->urlManager->createUrl(['video/index']); ?>" target="_blank" >网络试听</a></li>
        <li><a  href="<?= Yii::$app->urlManager->createUrl(['news/index','cid'=>7]); ?>" target="_blank">资讯中心</a></li>
        <li><a  href="<?= Yii::$app->urlManager->createUrl(['job/index']); ?>" target="_blank">企业招聘</a></li>
        <li><a  href="<?= Yii::$app->urlManager->createUrl(['jianli/index']); ?>" target="_blank">求职简历</a></li>
        <li><a  href="<?= Yii::$app->urlManager->createUrl(['price/index']); ?>" target="_blank">信息价</a></li>
        <li><a  href="<?= Yii::$app->urlManager->createUrl(['file-download/index']); ?>" target="_blank">资料下载</a></li>
        <li><a  href="<?= Yii::$app->urlManager->createUrl(['site/contact']); ?>" target="_blank">联系我们</a></li>
    </ul>
</div>

<?= $content ?>
    
<div class="foot"> 
	<div class="foot-zt">
        <div class="foot-left f-l">
            <div class="foot-left-top"><a href="/"><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/foot-logo.jpg" width="144" height="63" /></a></div>
            <ul  class="foot-left-bottom">
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/about']); ?>">关于我们</a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/contact']); ?>">联系我们</a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/mianze']); ?>">免责声明</a></li>
            </ul>
        </div>
        <div class="foot-middle f-l">
        	<?= $this->params['siteconfig']['n1']; ?>
        </div>
        <div class="foot-right f-l">
        	<div class="foot-right-l"><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/weixin.jpg" width="121" height="156" alt=""/></div>
            <div class="foot-right-r">
            	<div class="jl-qq">宇斌交流群</div>
                <p class="jl-nr"><?php echo $this->params['siteconfig']['n2']; ?></p>
                <div class="jl-dh">商务联系方式</div>
                <p class="jl-nr">黄老师：<?php echo $this->params['siteconfig']['n3']; ?></p>
                <p class="jl-nr">刘老师：<?php echo $this->params['siteconfig']['n4']; ?></p>
            </div>
        </div>
    </div>
  <div class="foot-bq">
      <p>Copyright© 2001-2016 Incorporated. All rights reserved. <?= $this->params['siteconfig']['beianhao']; ?></p>
        <p>技术支持：<a href="http://www.yifei100.com/" target="_blank">河南亿飞网络科技有限公司</a></p>
    </div>
</div>

<!-- footer end --> 
<!-- kehu start -->
<div class="kefu">
    <ul class="list-unstyled">
        <li><a href="/contact" title="更多联系方式" target="_blank" class="kefu-lx">在线客服</a></li>
        <li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=976220223&site=qq&menu=yes" class="kefu-zx">在线咨询</a></li>
        <li><a href="#yy" class="kefu-wx" title="官方微信" rel="nofollow">官方微信<span class="kefu-weixin"><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/kefu-weixin.jpg" width="140" height="140"></span></a></li>
        <li><a href="#top" class="kefu-top" title="回网页顶部" rel="nofollow">返回顶部</a></li>
    </ul>
</div>
<div style="display: none;"><?php echo $this->params['siteconfig']['tongji']; ?></div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
