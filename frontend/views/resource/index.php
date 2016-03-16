<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-28 15:53:59
 */
$this->registerCssFile('@web/statics/css/style.css',['depends'=>['frontend\assets\AppAsset']]);
$this->title = "网络试听";
$this->params['breadcrumbs'] = ['label'=>$this->title];
?>


<!--主体开始-->
    <?php echo $this->render('/layouts/_breadcrumbs'); ?>
    <div class="wrapper cl">
    <div class="slideTxtBox">
			<div class="hd">

            <ul>
<!--                <li>全部</li>-->
                <?php 
                //资源类型
                $types = Yii::$app->params['type'];
                foreach($types as $k=>$v):
                ?>
                <li<?php if($k == $type){echo ' class="on"';} ?>><a href="<?= Yii::$app->urlManager->createUrl(['resource/index','type'=>$k]); ?>"><?= $v; ?></a></li>
                <?php endforeach; ?>
            </ul>
			</div>
			<div class="bd">
				<div class="bd00">
					<div class="class-center">
                        <dl class="grade"><dt>年级</dt>
                            <dd<?php if(is_null($class)){echo ' class="grade-on"';} ?>>
                                <a href="<?= Yii::$app->urlManager->createUrl(['resource/index','type'=>$type]); ?>">全部</a>
                            </dd>
                            <?php 
                            //年级
                            $classes = Yii::$app->params['class'];
                            foreach($classes as $k=>$v):
                            ?>
                            <dd<?php if(!is_null($class) && ($class == $k)){echo ' class="grade-on"';} ?>><a href="<?= Yii::$app->urlManager->createUrl(['resource/index','type'=>$type,'class'=>$k,'key'=>$key]); ?>"><?= $v; ?></a></dd>
                            <?php endforeach; ?>
                        </dl>
                        <dl class="subject"><dt>课程</dt>
                            <dd class="subject-on"><a href="<?= Yii::$app->urlManager->createUrl(['resource/index','type'=>$type,'class'=>$class]); ?>">全部</a></dd>
                          <?php 
                            //年级
                            $courses = Yii::$app->params['course'];
                            foreach($courses as $kk=>$vv):
                            ?>
                            <dd<?php if(!is_null($course) && ($course == $kk)){echo ' class="subject-on"';} ?>><a href="<?= Yii::$app->urlManager->createUrl(['resource/index','type'=>$type,'class'=>$class,'course'=>$kk,'key'=>$key]); ?>"><?= $vv; ?></a></dd>
                            <?php endforeach; ?>
                          </dl>
                    </div>
                    <div class="sort">
                        <div class="sort-tit">
                             排序：
                             <a<?php if(isset($_GET['sort']) && $_GET['sort']=='time'){echo ' class="on"';} ?> href="<?= Yii::$app->urlManager->createUrl(['resource/index','type'=>$type,'class'=>$class,'course'=>$course,'sort'=>'time','key'=>$key]); ?>">添加时间</a>
                             <a<?php if(isset($_GET['sort']) && $_GET['sort']=='star'){echo ' class="on"';} ?> href="<?= Yii::$app->urlManager->createUrl(['resource/index','type'=>$type,'class'=>$class,'course'=>$course,'sort'=>'star','key'=>$key]); ?>">星级</a>
                        </div>
                        <?php foreach ($models as $k => $v): ?>
                        <?php
                            $thumb = '/statics/images/default-image.png';
                            $url = 'video';
                            if($type == 0){
                                $thumb = $v->video."?vframe/jpg/offset/".$v->thumb;
                            }else{
                                $thumb  = $v->thumb;
                                $url = 'show';
                            }
                        ?>
                        <div class="sort-body">
                            <div class="sort-body-l"><img src="<?= $thumb; ?>" width="198" height="112" alt=""/></div>
                            <div class="sort-body-m">
                                <div class="sort-body-m-t"><a href="<?= Yii::$app->urlManager->createUrl(['resource/'.$url,'u'=>$v->url]); ?>"><?= $v->title; ?></a></div>
                                <div class="sort-body-m-c"><?= $v->keyword; ?></div>
                                <div class="sort-body-m-b"><span class="bo">浏览量：<?= $v->views; ?></span><span class="down">下载量：<?= $v->downtime?$v->downtime:0; ?></span></div>
                            </div>
                            <div class="sort-body-r"><a href="<?= Yii::$app->urlManager->createUrl(['resource/'.$url,'u'=>$v->url]); ?>">查看详情</a></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php echo $this->render('/layouts/_pagination',['pagination'=>$pagination]); ?>
                    <div class="recommend-class">
                   	  <div class="recommend-class-tit">推荐内容</div>
                        <?php foreach ($infoRec as $k => $v): ?>
                      
                        <?php
                            $thumb = '/statics/images/default-image.png';
                            $url = 'video';
                            if($type == 0){
                                $thumb = $v->video."?vframe/jpg/offset/".$v->thumb;
                            }else{
                                $thumb  = $v->thumb;
                                $url = 'show';
                            }
                        ?>
                      
                        <div class="recommend-class-body<?php if($k !=4 ){echo ' margin-right36';}?>">
                            <img src="<?= $thumb; ?>" width="243" height="124" />
                            <div class="recommend-class-body-tit"><?= $v->title; ?></div>
                            <div class="recommend-class-body-fb"><?= $v->keyword; ?></div>
                            <div class="recommend-class-body-ck"><a href="<?= Yii::$app->urlManager->createUrl(['resource/'.$url,'u'=>$v->url]); ?>">查看详情</a></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                 </div>


			</div>
            
		</div>
      <div class="cl"></div>  
</div>

