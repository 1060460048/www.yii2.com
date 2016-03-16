<?php
/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-23 11:38:18
 */
$this->registerCssFile('@web/statics/css/index.css',['depends'=>['frontend\assets\AppAsset']]);
$this->title = '首页';
$kaibanxinxi = \common\models\News::getNews(6,5);
?>
<?= $this->render('/layouts/_banner',['slider'=>$slider]); ?>
<!--主体内容开始-->
<div class="wrapper">
    <!--为什么选择简扬开始-->
    <div class="why-choose">
    	<?php 
        
        $ads = common\models\Ads::find()->where(['place'=>0])->one();
        if($ads){
            if($ads->url){
                echo '<a href="'.$ads->url.'" target="_blank"><img src="'.$ads->thumb.'" /></a>';
            }else{
                echo '<img src="'.$ads->thumb.'" />';
            }
        }
        ?>
    </div>
   <!--为什么选择简扬结束-->
   <div class="wrapper">
   		<div class="wrapper-index-l fl">
        	<!--精品课程开始-->
            	<div class="excellent-course ">
                	<div class="excellent-course-tit">精品微课</div>
                    <div class="excellent-course-nr">
                    	<ul>
                            <?php foreach ($weike as $k => $v): ?>
                        	<li>
                                <a href="<?= Yii::$app->urlManager->createUrl(['resource/video','u'=>$v->url]); ?>">
                                    <img src="<?= $v->video."?vframe/jpg/offset/".$v->thumb; ?>" width="247" height="139" alt=""/>
                                    <br /><?= $v->title; ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <!--精品课程结束-->
            <!--名师教案开始-->
            	<div class="excellent-course ">
                    <div class="lesson-plans-tit"><a href="<?= Yii::$app->urlManager->createUrl(['resource/index','type'=>1]); ?>">更多>></a>名师教案</div>
                    <div class="lesson-plans-nr">
                        <?php foreach ($jiaoan as $k => $v): ?>
                        
                        <div class="lesson-body cl<?php if($k == 2){echo ' no-border';}?>">
                            <img src="<?= $v->thumb; ?>" width="190" height="123" alt=""/>
                            <div  class="lesson-body-r">
                                <div  class="lesson-body-r-t"><a href="<?= Yii::$app->urlManager->createUrl(['resource/show','u'=>$v->url]); ?>"><?= $v->title; ?></a><img src="/statics/images/img_89.jpg" width="35" height="13" alt=""/></div>
                                <div  class="lesson-body-r-c"><?= $v->keyword; ?></div>
                                <div  class="lesson-body-r-b">
                                    <span class="see">(<?= $v->views; ?>)</span>
<!--                                    <span class="down">(<?= $v->c; ?>)</span>
                                    <div class="star4"></div>                             -->
                              </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    
                    
                  </div>
                </div>
            <!--名师教案结束-->
            <!--名师课件开始-->
            	<div class="excellent-course ">
                    <div class="lesson-plans-tit"><a href="<?= Yii::$app->urlManager->createUrl(['resource/index','type'=>2]); ?>">更多>></a>名师课件</div>
                  <div class="lesson-plans-nr">
                    	<?php foreach ($kejian as $k => $v): ?>
                        
                        <div class="lesson-body cl<?php if($k == 2){echo ' no-border';}?>">
                            <img src="<?= $v->thumb; ?>" width="190" height="123" alt=""/>
                            <div  class="lesson-body-r">
                                <div  class="lesson-body-r-t"><a href="<?= Yii::$app->urlManager->createUrl(['resource/show','u'=>$v->url]); ?>"><?= $v->title; ?></a><img src="/statics/images/img_89.jpg" width="35" height="13" alt=""/></div>
                                <div  class="lesson-body-r-c"><?= $v->keyword; ?></div>
                                <div  class="lesson-body-r-b">
                                    <span class="see">(<?= $v->views; ?>)</span>
                              </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    
                  </div>
                </div>
            <!--名师课件结束-->
            <!--精品试题开始-->
            	<div class="excellent-course ">
                	<div class="test-tit"><a href="<?= Yii::$app->urlManager->createUrl(['resource/index','type'=>3]); ?>">更多>></a>精品试题</div>
                  <div class="lesson-plans-nr">
                    	<?php foreach ($shiti as $k => $v): ?>
                        
                        <div class="lesson-body cl<?php if($k == 2){echo ' no-border';}?>">
                            <img src="<?= $v->thumb; ?>" width="190" height="123" alt=""/>
                            <div  class="lesson-body-r">
                                <div  class="lesson-body-r-t"><a href="<?= Yii::$app->urlManager->createUrl(['resource/show','u'=>$v->url]); ?>"><?= $v->title; ?></a><img src="/statics/images/img_89.jpg" width="35" height="13" alt=""/></div>
                                <div  class="lesson-body-r-c"><?= $v->keyword; ?></div>
                                <div  class="lesson-body-r-b">
                                    <span class="see">(<?= $v->views; ?>)</span>
<!--                                    <span class="down">(<?= $v->c; ?>)</span>
                                    <div class="star4"></div>                             -->
                              </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    
                  </div>
                </div>
            <!--精品试题结束-->
        </div>
        <div class="wrapper-index-r fr">
            <!--新闻公告开始-->
       	  <div class="news">
              <div class="news-tit"><a href="<?= Yii::$app->urlManager->createUrl(['news/index']); ?>">更多>></a>新闻公告</div>
              <ul class="news-nr">
                    <?php foreach ($news as $k => $v): ?>
                  <li<?php if($k == 2){echo ' class="no-border"';} ?>><img src="<?= $v->thumb; ?>" width="103" height="85" alt=""/>
                      <div class="news-nr-r">
                          <div class="news-nr-r-tit">
                              <a href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$v->id]); ?>"><?= $v->title; ?>？</a>
                          </div>
                          <div class="news-nr-r-nr"><?= $v->intro; ?></div>
                      </div>
                    </li>
                    <?php endforeach; ?>
                    
              </ul>
            </div>
            <!--新闻公告结束-->
        	
            <!--推荐下载开始-->
            <div class="recommend margin-bottom33">
                <div class="recommend-tit">推荐下载</div>
                <div class="recommend-body">
                  <div class="recommend-img">
                      <img src="/statics/images/img_77.jpg" width="306" height="116" alt=""/></div>
                  <ul class="recommend-nr">
                      <?php foreach ($recdown as $k => $v): ?>
                      
                      <li><a href="<?= Yii::$app->urlManager->createUrl(['resource/show','u'=>$v->url]); ?>"><?= $v->title; ?></a></li>
                        <?php endforeach; ?>
                        
                    </ul>
                </div>
                <div class="ad-img"><img src="/statics/images/img_97.jpg" width="326" height="138" alt=""/></div>
            </div>
            <!--推荐下载结束-->
            <!--学员评价开始-->
            <div class="recommend margin-bottom33">
            	<div class="recommend-tit"><a href="#">更多>></a>学员评价</div>
                <div class="evaluate">
                    <?php foreach ($pinglun as $k => $v): ?>
                	<div class="evaluate-body">
                    	<div class="evaluate-body-l">
                            <img src="<?php if($v->user){echo $v->user->avatar;}else{echo "/statics/images/img_126.jpg";} ?>" alt="" /> </div>
                        <div class="evaluate-body-r">
                            <div class="evaluate-body-r-tit"><?= $v->content; ?></div>
                            <div class="evaluate-body-r-nr"><?php if($v->user){echo $v->user->username;}else{echo "未知";} ?><span><?= date("Y/m/d",$v->created_at); ?>&nbsp;&nbsp;</span></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
            </div>
            <!--学员评价结束-->
            <!--学霸必备开始-->
          <div class="essential margin-bottom33">
            	<div class="essential-tit">学霸必备</div>
              <ul class="essential-nr">
                  <?php foreach ($xueba as $k => $v): ?>
                  
                  <li<?php if($k == 7){echo " class='no-border'";}  ?>>
                      <a href="<?= Yii::$app->urlManager->createUrl(['resource/show','u'=>$v->url]); ?>">
                    <?= $v->title; ?></a></li>
                    <?php endforeach; ?>
                    
                </ul>
            </div>
            <!--学霸必备结束-->
        </div>
        <div class="cl"></div>
   </div>
   <!--底部广告开始-->
   <div  class="db-ad margin-bottom33">
       <?php 
        
        $ads = common\models\Ads::find()->where(['place'=>1])->one();
        if($ads){
            if($ads->url){
                echo '<a href="'.$ads->url.'" target="_blank"><img src="'.$ads->thumb.'" width="1190" height="80" /></a>';
            }else{
                echo '<img src="'.$ads->thumb.'" width="1190" height="80" />';
            }
        }
        ?>
   </div>
   <!--底部广告结束-->
   <!--友情链接开始-->
   <div class="friendship">
   		<div class="friendship-tit">友情链接</div>
        <ul class="friendship-nr">
            <?php foreach ($friendlink as $k => $v): ?>
            <li><a href="<?= $v->link; ?>" target="_blank"><?= $v->name; ?></a></li>
            <?php endforeach; ?>
        </ul>
   </div>
   <!--友情链接结束-->
</div>