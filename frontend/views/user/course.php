<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2016-3-14 22:57:43
 */
$this->title = "我的课程";
$this->registerCssFile('@web/statics/css/user.css',['depends'=>['frontend\assets\AppAsset']]);
?>
<div class="wrapper">
    <?= $this->render("_left"); ?>
  <div class="wrapper-user-r">
   	<div class="c-classbody">
        	<div class="c-classbody-tit">
                我看过的课程
                <?php $courses = Yii::$app->params['type'];
                foreach($courses as $k=>$v):
                ?>
                <a <?php if($k == $type){echo ' style="color:red;"';} ?>href="<?= Yii::$app->urlManager->createUrl(['user/course','type'=>$k]); ?>"><?= $v; ?></a>
                <?php endforeach; ?>
            </div>
            <ul class="c-classbody-body">
                <?php foreach ($models as $k => $v): ?>
                <?php
                    $thumb = '/statics/images/default-image.png';
                    $title = '';
                    if($type  == 0){
                        $url = 'video';
                        
                        if($v->weike){
                            $urla = $v->weike->url;
                            $title = $v->weike->title;
                            $thumb = $v->weike->video."?vframe/jpg/offset/".$v->weike->thumb;
                        }else{
                            continue;
                        }
                        
                    }else{
                        $url = 'show';
                        
                        if($v->getResource($v->rid,$type)){
                            $x = $v->getResource($v->rid,$type);
                            //var_dump($x);die;
                            $urla = $x->url;
                            $title = $x->title;
                            $thumb  = $x->thumb;
                        }else{
                            continue;
                        }
                    }
                ?>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['resource/'.$url,'u'=>$urla]); ?>">
                        <img src="<?= $thumb; ?>" width="247" height="139" alt=""/>
                        <br/><?= $title; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php echo $this->render('/layouts/_pagination',['pagination'=>$pagination]); ?>
           
        </div>
  </div>
    <div class="cl"></div>
</div>
