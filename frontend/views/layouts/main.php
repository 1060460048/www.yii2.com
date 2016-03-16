<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
<?= Html::csrfMetaTags() ?>
<title><?= Html::encode($this->title) ?>_<?= $this->params['siteconfig']['sitename'] ?></title>
<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody(); ?>
<div class="header">	
    <div class="header-welcome">
        <img src="/statics/images/img_03.jpg" width="261" height="15" alt="" />
        <span>
            <?php if (Yii::$app->user->isGuest) { ?>
                <a href="<?= Yii::$app->urlManager->createUrl(['site/login']); ?>" class="login">登录</a>|
                <a href="<?= Yii::$app->urlManager->createUrl(['site/reg']); ?>" class="register">注册</a>|
            <?php } else { ?>
                <a class="" href="<?= Yii::$app->urlManager->createUrl(['user/index']) ?>"><?= Yii::$app->user->identity->username ?></a>&nbsp;<a href="<?= Yii::$app->urlManager->createUrl(['site/logout']) ?>">[ 退出 ]</a>
            <?php } ?>
            
            <i>400-123-3333</i>
        </span>
    </div>
  <div class="logo-search">
  	<div class="wrapper">
    	<div class="logo fl">
            <a href="<?= Yii::$app->urlManager->createUrl(['site/index']); ?>">
                <img src="/statics/images/img_15.jpg" width="154" height="57" alt=""/>
            </a>
        </div>
        <div class="search-body fl">
        	<div class="search-body-top">
                <form action="<?= Yii::$app->urlManager->createUrl(['resource/index']); ?>" type="get">
                    <select name="type" id="choose">
                        <?php $types = Yii::$app->params['type'];
                        $currentType = Yii::$app->request->get('type');
                        foreach($types as $k=>$v):
                        ?>
                        <option value="<?= $k; ?>" <?php if($currentType == $k){echo " selected";}?>><?= $v; ?></option>
                        <?php endforeach; ?>
                    </select> 
                    <input class="inp_srh" name="key" value="<?= Yii::$app->request->get('key'); ?>" placeholder="请输入您要搜索的作品" >
                    <input class="btn_srh" type="submit" value="">
                </form>
            </div>
            <!--<div class="search-body-bottom">热搜内容：<span>圆周运动导数及其应用</span><span>英语定语从句</span><span>化学反应</span><span>速率与化学平衡</span></div>-->
        </div>
        <a class="myclasses fr" href="<?= Yii::$app->urlManager->createUrl(['user/course','type'=>0]); ?>">我的学习课程</a>
    </div>
  </div>
  <div class="nav-body">
  	<ul id="jMenu">
        <?php 
        $controllerID = Yii::$app->controller->id;
        $actionID = Yii::$app->controller->action->id;
        
        ?>
    <li><a class="fNiv<?php if($controllerID == 'site' && $actionID == 'index'){echo ' nav-selected';}?>" href="<?= Yii::$app->urlManager->createUrl(['site/index']); ?>">首页</a></li>
	<?php 
    $class = Yii::$app->params['class'];
    $course = Yii::$app->params['course'];
    $type = Yii::$app->params['type'];
    foreach($type as $kkk=>$vvv):
    ?>
    <li><a class="fNiv<?php if($controllerID == 'resource' && $actionID == 'index' && $kkk == Yii::$app->request->get('type')){echo ' nav-selected';}?>" href="<?= Yii::$app->urlManager->createUrl(['resource/index','type'=>$kkk]); ?>"><?= $vvv; ?></a>
		<ul>
			<li class="arrow"></li>
            <?php 
           
            foreach ($class as $k => $v): ?>
            
            <li><a href="<?= Yii::$app->urlManager->createUrl(['resource/index','type'=>$kkk,'class'=>$k]); ?>"><?= $v; ?></a>
				<ul>
                    <?php foreach ($course as $kk => $vv): ?>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['resource/index','type'=>$kkk,'class'=>$k,'course'=>$kk]); ?>"><?= $vv; ?></a></li>
                    <?php endforeach; ?>
				</ul>
			</li>
            <?php endforeach; ?>
		</ul>
	</li>
    <?php endforeach;unset($class,$course,$type,$k,$kk,$kkk,$v,$vv,$vvv); ?>
    <li><a class="fNiv<?php if($controllerID == 'site' && $actionID == 'about'){echo ' nav-selected';}?>" href="<?= Yii::$app->urlManager->createUrl(['site/about']); ?>">关于我们</a></li>
    <li><a class="fNiv<?php if($controllerID == 'site' && $actionID == 'contact'){echo ' nav-selected';}?>" href="<?= Yii::$app->urlManager->createUrl(['site/contact']); ?>">联系我们</a></li>
  </ul>
 </div>
</div>

<?= $content ?>
    
<!--底部开始-->
<div class="footer margin-top50">
  <div class="footer-body">
   	  <div class="footer-body-top">
        	<div class="footer-body-top-l">
       	  		<img src="/statics/images/footer-logo.jpg" width="159" height="70" alt=""/><br/>在线学习网通过“微课、资料、习题、检测、互动”等教学方
法，提供一流的教学内容和服务。既为学生搭建了一个可靠高
效的优质平台，又满足了广大一线教师提升学术水平、体现自
我价值的迫切需求。 
          </div>
            <div class="footer-body-top-m">
            	我要留言<br/>
                <form action="/feed" method="post">
                    <input type="hidden" value="<?=Yii::$app->request->csrfToken; ?>" name="_csrf">
                    <input type="text" class="message-name" name="Feedback[name]" placeholder="姓名:">
                    <input type="text" class="message-tel" name="Feedback[phone]" placeholder="电话:">
                    <textarea class="message-nr" name="Feedback[content]" placeholder="请输入您的留言"></textarea>
                    <input type="reset" class="message-cz" value="重新填写"><input type="submit" class="message-tj">
                </form>
            </div>
            <div class="footer-body-top-r">
            	<div class="footer-body-top-r-top"><img src="/statics/images/ewm.jpg" width="95" height="97" alt=""/><div class="gzwx"><span>关注微信公众平台</span><br/>关注在线学习网微信，随时掌握最新网站更新动态...</div></div>
              <div class="footer-body-top-r-center">QQ群号码：<br/>123456789 &nbsp;&nbsp;&nbsp;123456789</div>
              <div class="footer-body-top-r-bottom">咨询电话：<br/>123456789 &nbsp;&nbsp;&nbsp;123456789</div>
        </div>
      </div>
      <div class="copyright">版权归简扬电子出版所有Copyright © zaixianxuexiwang.com All Rights Reserved  <?php echo $this->params['siteconfig']['beianhao']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;由<a href="http://www.yifei100.com/" target="_blank">河南亿飞网络科技有限公司</a>提供技术支持</div>
    </div>
</div>
<div id="leftsead">
	<ul>
		<li><a href="tencent://message/?uin=800027897&Site=test315.nesky.cn&Menu=yes"><img src="/statics/images/kf-qq.jpg" width="43" height="66" alt=""/></a></li>
		<li class="kf-wx"><a class="youhui"><img src="/statics/images/kf-wx.jpg" width="43" height="44" alt="" class="shows"/><img src="/statics/images/ewm.jpg" width="95" height="97" class="hides" usemap="#taklhtml"/><map name="taklhtml"><area shape="rect" coords="26,273,115,300 " href="http://www.17sucai.com/" /></map></a></li>
        <li><a id="top_btn"><img src="/statics/images/kf-fh.jpg" width="43" height="43" alt=""/></a></li>
	</ul>
</div>

<div style="display: none;"><?php echo $this->params['siteconfig']['tongji']; ?></div>
<?php 
$js = <<< JS
$(document).ready(function(){
	$("#leftsead a").hover(function(){
		if($(this).prop("className")=="youhui"){
			$(this).children("img.hides").show();
		}else{
			$(this).children("img.hides").show();
			$(this).children("img.shows").hide();
			$(this).children("img.hides").animate({marginRight:'0px'},'slow'); 
		}
	},function(){ 
		if($(this).prop("className")=="youhui"){
			$(this).children("img.hides").hide('slow');
		}else{
			$(this).children("img.hides").animate({marginRight:'-143px'},'slow',function(){
                $(this).hide();
                $(this).next("img.shows").show();
            });
		}
	});

	$("#top_btn").click(function(){if(scroll=="off") return;$("html,body").animate({scrollTop: 0}, 600);});
});        
JS;
$this->registerJs($js,  yii\web\View::POS_END);
?>
<?php $this->endBody() ?>
<script>
$(document).ready(function(){
    $('input, textarea').placeholder();
    $("#jMenu").jMenu();
});
</script>

</body>
</html>
<?php $this->endPage() ?>
