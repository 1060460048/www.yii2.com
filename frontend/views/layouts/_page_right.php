<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2016-3-14 19:19:17
 */
?>
<div class="wrapper-news-r">
    	<div class="news-ad01 margin-bottom25"><img src="/statics/images/new-1.jpg" width="260" height="166" alt=""/></div>
         <div class="hot-news margin-bottom25">
        	<div class="tuijian-down-tit">热门资讯</div>
            <ul class="hot-news-nr">
                <?php 
                   $hotNews = \common\models\News::find()->where(['and','status='.\common\models\Status::STATUS_REC])->orderBy(['id'=>SORT_DESC])->limit(4)->all();
                   foreach ($hotNews as $k => $v) {

                   ?>
                   
                    <li><img src="<?= $v->thumb; ?>" width="103" height="85" alt=""/>
                    <div class="hot-news-nr-r">
                        <div class="hot-news-nr-r-tit"><a href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$v->id]); ?>"><?= $v->title; ?></a></div>
                        <div class="hot-news-nr-r-nr"><?= $v->intro; ?></div>
                    </div>
                    </li>
                <?php } ?>
              </ul>
        </div>
        <div class="tuijian-down margin-bottom25">
        	<div class="tuijian-down-tit">推荐下载</div>
            <div class="tuijian-down-img"><img src="/statics/images/img_78.jpg" width="259" height="116" alt=""/></div>
            <ul class="tuijian-down-nr">
                <?php 
                $recdown = \common\models\Resource::find()->where(['and',['status'=>  \common\models\Status::STATUS_REC]])->orderBy(['id'=>SORT_DESC])->limit(6)->all();
                foreach($recdown as $k=>$v):
                ?>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['resource/show','u'=>$v->url]); ?>"><?= $v->title; ?></a></li>
                <?php endforeach; ?>
                
            </ul>
        </div>
    </div>
