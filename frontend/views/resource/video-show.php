<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-28 16:01:14
 */
$this->registerCssFile('@web/statics/css/style.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile("@web/statics/ckplayer/ckplayer.js");
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label'=>'微课','url'=>['resource/index','type'=>0]];
$this->params['breadcrumbs'][] = ['label'=>$this->title];


?>

<?php echo $this->render('/layouts/_breadcrumbs'); ?>
<div class="wrapper cl">
    <div class="media">
    	<div class="media-l" id="video">
            <img src="/statics/images/media.jpg" width="747" height="445" alt=""/>
        </div>
        <div class="media-r">
            <div class="media-r-top"><?= $model->title; ?></div>
            <div class="media-r-center">
                <div class="media-r-kc">所属科目<br/><span class="corlor-l"><?= $model->getType($model->course,'course'); ?></span></div>
                <div class="media-r-kc">适合对象<br/><span class="corlor-l">一年级</span></div>
            </div>
            <div class="media-r-ts">简介<br/><p><br/></p>
                <span>
                    <?= $model->keyword; ?>
                </span></div>
            <div  class="media-r-bottom"><span class="bo"><?= $model->views; ?>次播放</span><!--<span class="down">(<?= $model->downtime; ?>)</span>--><div class="bshare-custom fl"><div class="bsPromo bsPromo2"></div><a title="分享到QQ空间" class="bshare-qzone"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="分享到微信" class="bshare-weixin" href="javascript:void(0);"></a></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=1&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script></div>
            <div class="media-r-down"><a href="<?= $model->video; ?>">立即下载</a></div>
        </div>
    </div>
		<div class="class-detail">
        	<div class="class-detail-tit"><span>课程详情</span></div>
            <div class="class-detail-nr">
                <?= $model->content; ?>
            </div>
        </div>	
		<div class="collegecomments">
        	<div class="collegecomments-tit">学员评论</div>
            <div id="star">
                <span>我来评分</span>
                <ul>
                    <li><a href="javascript:;">1</a></li>
                    <li><a href="javascript:;">2</a></li>
                    <li><a href="javascript:;">3</a></li>
                    <li><a href="javascript:;">4</a></li>
                    <li><a href="javascript:;">5</a></li>
                </ul>
                <span  style=" color:#ff6600;">分</span>
                
            </div>
            <form id="form" action="<?= Yii::$app->urlManager->createUrl(['site/save-comment']); ?>" method="post">
                <input type="hidden" id="starnum" name="Pinglun[star]" value="">
                <input type="hidden" name="Pinglun[type]" value="0">
                <input type="hidden" name="Pinglun[rid]" value="<?= $model->id; ?>">
                <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken; ?>">
                <textarea class="collegecomments-nr" id="content" name="Pinglun[content]" placeholder="请输入要评论的内容"></textarea>
            
            <div class="collegecomments-btn"><input type="submit"  value="发表评论"></div>
            </form>
            <div class="collegecomments-body" id ="comment">
            
            </div>
        </div>

              
					
                    
        <div class="recommend-class margin-top20">
           <div class="recommend-class-tit">推荐内容</div>
            <?php 
            $infoRec = \common\models\Video::find()->where('status='.\common\models\Status::STATUS_REC)->limit(4)->all();
             
            foreach ($infoRec as $k => $v): ?>     
            <?php
                $thumb = '/statics/images/default-image.png';
                $url = 'video';
                
                $thumb = $v->video."?vframe/jpg/offset/".$v->thumb;
                
            ?>
            <div class="recommend-class-body<?php if($k !=4 ){echo ' margin-right36';}?>">
                <img src="<?= $thumb; ?>" width="243" height="124" />
                <div class="recommend-class-body-tit"><?= $v->title; ?></div>
                <div class="recommend-class-body-fb"><?= $v->keyword; ?></div>
                <div class="recommend-class-body-ck"><a href="<?= Yii::$app->urlManager->createUrl(['resource/'.$url,'u'=>$v->url]); ?>">查看详情</a></div>
            </div>
            <?php endforeach; ?>
         </div>
                 
		
            
		
      <div class="cl"></div>  
</div>
<?php if(Yii::$app->user->isGuest){ ?>
<div id="overlay">
	<div class="overlay-body">
       未登录状态将不能查看详情
       <a href="<?= Yii::$app->urlManager->createUrl(['site/login']); ?>">登录</a> <a href="<?= Yii::$app->urlManager->createUrl(['site/reg']); ?>">注册</a> </div>
</div>
<?php } ?>	
<?php 
$videoUrl = $model->video;
$isGuest = Yii::$app->user->isGuest;
$productcommentUrl = Yii::$app->urlManager->createUrl(['resource/comment','id'=>$model->id,'type'=>0]);
//$videoUrl = "http://movie.ks.js.cn/flv/other/1_0.flv";
$js = <<< JS
  $.ajax({
        url: "{$productcommentUrl}",
        type: "GET",
        dataType: "html",
        success: function(data){
            $("#comment").html(data);
        }
    }).fail(function(){
        alert("Error");
    });
        
    $('#comment').on('click', '.pages a', function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            type: "GET",
            dataType: "html",
            success: function(data){
                $('#comment').html(data);
            }
        }).fail(function(){
            alert("Error");
        });

    });
 var flashvars={
		f:'{$videoUrl}',
		c:0,
		b:1
		};
	var video=['{$videoUrl}'];
	CKobject.embed('/statics/ckplayer/ckplayer.swf','video','ckplayer_video','747','445',false,flashvars,video)	
	function closelights(){//关灯
		alert(' 本演示不支持开关灯');
	}
	function openlights(){//开灯
		alert(' 本演示不支持开关灯');
	}
    
    $('#form').submit(function(){
       return check();

    });

window.onload = function (){

	var oStar = document.getElementById("star");
	var aLi = oStar.getElementsByTagName("li");
	var oUl = oStar.getElementsByTagName("ul")[0];
	var oSpan = oStar.getElementsByTagName("span")[1];
	var oP = oStar.getElementsByTagName("p")[0];
	var i = iScore = iStar = 0;
	var aMsg = [
				"很不满意|差得太离谱，与卖家描述的严重不符，非常不满",
				"不满意|部分有破损，与卖家描述的不符，不满意",
				"一般|质量一般，没有卖家描述的那么好",
				"满意|质量不错，与卖家描述的基本一致，还是挺满意的",
				"非常满意|质量非常好，与卖家描述的完全一致，非常满意"
				]
	
	for (i = 1; i <= aLi.length; i++){
		aLi[i - 1].index = i;
		
		//鼠标移过显示分数
		aLi[i - 1].onmouseover = function (){
			fnPoint(this.index);
			//浮动层显示
			oP.style.display = "block";
			//计算浮动层位置
			oP.style.left = oUl.offsetLeft + this.index * this.offsetWidth - 104 + "px";
			//匹配浮动层文字内容
			oP.innerHTML = "<em><b>" + this.index + "</b> 分 " + aMsg[this.index - 1].match(/(.+)\|/)[1] + "</em>" + aMsg[this.index - 1].match(/\|(.+)/)[1]
		};
		
		//鼠标离开后恢复上次评分
		aLi[i - 1].onmouseout = function (){
			fnPoint();
			//关闭浮动层
			oP.style.display = "none"
		};
		
		//点击后进行评分处理
		aLi[i - 1].onclick = function (){
			iStar = this.index;
            $("#starnum").val(this.index);
			oP.style.display = "none";
			oSpan.innerHTML = "<strong>" + (this.index) + " 分</strong> (" + aMsg[this.index - 1].match(/\|(.+)/)[1] + ")"
		}
	}
	
	//评分处理
	function fnPoint(iArg){
		//分数赋值
		iScore = iArg || iStar;
		for (i = 0; i < aLi.length; i++) aLi[i].className = i < iScore ? "on" : "";	
	}
	
    
};
    
    
function check(){
        var isGuest = "{$isGuest}";
        if(isGuest != ""){
            alert('请登录后再发布');
            return false;
        }
        var star = $("#starnum").val();
        if(star == ""){
            alert('请选择评星');
            return false;
        }
    
        var star = $("#content").val();
        if(star == ""){
            alert('请输入内容');
            $("#content").focus();
            return false;
        }
        return true;
}
JS;
$this->registerJs($js);

?>