<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2016-3-14 23:02:29
 */
$this->title = "我的评论";
$this->registerCssFile('@web/statics/css/user.css',['depends'=>['frontend\assets\AppAsset']]);

?>
<div class="wrapper">
    <?= $this->render('_left'); ?>
  <div class="wrapper-user-r margin-bottom50">
   	<div class="c-discuss">
        <?php foreach ($models as $k => $v): ?>
            
            <?php $url=$title = '';  if($v->type == 0){
                if($v->weike){
                    $url = Yii::$app->urlManager->createUrl(['resource/video','u'=>$v->weike->url]);
                    $title = $v->weike->title;
                }else{
                    continue;
                }
            }else{
                if($x = $v->getResource($v->type,$v->rid)){
                    $url = Yii::$app->urlManager->createUrl(['resource/show','u'=>$x->url]);
                    $title = $x->title;
                }else{
                    continue;
                }
            } ?>
    	<div class="c-discuss-zt">
            <img src="<?= Yii::$app->user->identity->avatar; ?>" width="103" height="85" alt=""/> 
                <div class="c-discuss-zt-r">
                    <div class="c-discuss-zt-mc">我对<span><a href='<?= $url; ?>'><?= $title; ?></a></span>发表了评论</div>
                    <div class="c-discuss-zt-sj"><?= date("Y-m-d H:i:s",$v->created_at); ?></div>
                    <div class="c-discuss-zt-nr"><?= $v->content; ?></div>
                </div>
         </div>
        <?php endforeach; ?>
         <?php echo $this->render('/layouts/_pagination',['pagination'=>$pagination]); ?>
    </div>
  </div>
    <div class="cl"></div>
</div>
