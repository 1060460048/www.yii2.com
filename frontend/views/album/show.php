<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-28 13:39:54
 */
$this->title = $model->title;
?>
<div class="container">
	<div class="container-left f-l">
    	<?php echo $this->render('/layouts/_breadcrumbs'); ?>
        <div class="detail-nr m-t-20">
          <div class="xq-bt"><?= $model->title; ?></div>
          <div class="time"><span>时间: <?= common\components\Utils::dateFormat($model->created_at, 4); ?></span><span>来源：<?= $model->author; ?></span><span>阅读数：<?= $model->views; ?>人</span></div>
            <div class="nr-hg">
           	  <div class="imgnav" id="imgnav"> 
			<div id="img">
                <?php foreach ($model->images as $k => $v): ?>
                
                <img src="<?= $v->image; ?>" />
                <?php endforeach; ?>
				
			  <div id="front" title="上一张"><a href="javaScript:void(0)" class="pngFix"></a></div>
				<div id="next" title="下一张"><a href="javaScript:void(0)" class="pngFix"></a></div>
			</div>
		
			<div id="content">
				<?= $model->intro; ?>
			</div>
		
			<div id="cbtn">
                <i class="picSildeLeft"><img src="<?= Yii::$app->params['staticsPath']; ?>images/ico/picSlideLeft.gif"/></i> 
				<i class="picSildeRight"><img src="<?= Yii::$app->params['staticsPath']; ?>images/ico/picSlideRight.gif"/></i> 
				<div id="cSlideUl">
					<ul>
						<?php foreach ($model->images as $k => $v): ?>
                        <li><img src="<?= $v->thumb; ?>" /><tt></tt></li>               
                        <?php endforeach; ?>
					</ul>
				</div>
			</div>         
		
		</div>
            </div>
            <div class="xian m-t-20"></div>
            <div class="zp-detail"><label class="fany">上一篇：</label>
                <?php if($prev){ ?>
                <a href="<?= Yii::$app->urlManager->createUrl(['album/show','id'=>$prev->id]); ?>"><?= $prev->title; ?></a>
                <?php }else{ echo "暂无";} ?>
            </div>
        <div class="zp-detail"><label class="fany">下一篇：</label>
            <?php if($next){ ?>
                <a href="<?= Yii::$app->urlManager->createUrl(['album/show','id'=>$next->id]); ?>"><?= $next->title; ?></a>
                <?php }else{ echo "暂无";} ?>
        </div> 
            <div class="fhlb"><a href="<?= Yii::$app->urlManager->createUrl(['album/index']); ?>">返回列表</a></div> 
      </div>
        <div class="clear"></div>
        
     </div>
     <div class="container-right f-r">
    	<?php echo $this->render('/layouts/_pr_zhentifabu'); ?>
        <?php echo $this->render('/layouts/_pr_baokaozhinan'); ?>
     </div>
     <div class="clear"></div>
</div>
<?php 
$js = <<< JS
        $(document).ready(function(){                          

	var index=0;
	var length=$("#img img").length;
	var i=1;

	//关键函数：通过控制i ，来显示图片
	function showImg(i){
		$("#img img").eq(i).stop(true,true).fadeIn(800).siblings("img").hide();
		$("#cbtn li").eq(i).addClass("hov").siblings().removeClass("hov");
	}

	function slideNext(){
		if(index >= 0 && index < length-1) {
			++index;
			showImg(index);
		}else{
			if(confirm("已经是最后一张,点击确定重新浏览！")){
				showImg(0);
				index=0;
				aniPx=(length-5)*142+'px'; //所有图片数 - 可见图片数 * 每张的距离 = 最后一张滚动到第一张的距离
				$("#cSlideUl ul").animate({ "left": "+="+aniPx },200);
				i=1;
			}
			return false;
		}
		if(i<0 || i>length-5){
			return false;
		}						  
		$("#cSlideUl ul").animate({ "left": "-=142px" },200)
		i++;
	}

	function slideFront(){
		if(index >= 1 ) {
			--index;
			showImg(index);
		}
		if(i<2 || i>length+5){
			return false;
		}
		$("#cSlideUl ul").animate({ "left": "+=142px" },200)
		i--;
	}
		
	$("#img img").eq(0).show();
	$("#cbtn li").eq(0).addClass("hov");
	
	$("#cbtn tt").each(function(e){
		var str=(e+1)+"/"+length;
		$(this).html(str)
	})

	$(".picSildeRight,#next").click(function(){
		slideNext();
	});
	
	$(".picSildeLeft,#front").click(function(){
		slideFront();
	});
	
	$("#cbtn li").click(function(){
		index  =  $("#cbtn li").index(this);
		showImg(index);
	});	
	
	$("#next,#front").hover(function(){
		$(this).children("a").fadeIn();
	},function(){
		$(this).children("a").fadeOut();
	});
	
});
JS;
$this->registerJs($js);
?>