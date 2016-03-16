<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-28 16:01:14
 */
$this->registerCssFile('@web/statics/css/style.css',['depends'=>['frontend\assets\AppAsset']]);
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label'=>$model->getType($model->type,'type'),'url'=>['resource/index','type'=>$model->type]];
$this->params['breadcrumbs'][] = ['label'=>$this->title];

?>
<?php echo $this->render('/layouts/_breadcrumbs'); ?>
<div class="wrapper">
	<div class="wrapper-news-l">
        <div class="wrapper-news-l-body margin-bottom25">
            <div class="article-title">
                <h4 class="margin-top20"><?= $model->title; ?></h4>
                <div class="article-fb"><span class="see"><?= $model->views; ?></span><span>作者：<?= $model->author; ?></span><span>时间：<?= date("Y.m.d",$model->created_at); ?></span><div class="bshare-custom fl"><div class="bsPromo bsPromo2"></div><a title="分享到QQ空间" class="bshare-qzone"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="分享到微信" class="bshare-weixin" href="javascript:void(0);"></a></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=1&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script></div>	
            </div>
            <div class="article-con">
                
                <?php
                $content = $model->content;
                $ptnIco = '/<img.*?src=".*?attachment\/fileTypeImages.*?".*?>/';
                $ptn = '/<a.*? href="\/upload\/file\/(.*?)".*?a>/';
                //preg_match_all($ptnIco, $content, $matches);
                $str = preg_replace($ptnIco, "", $content);
                preg_match_all($ptn, $str, $matches);
                $str = preg_replace($ptn, "", $str);
                //var_dump($matches);
                if(isset($matches[1]) && isset($matches[1][0])){
                    $downUrl = "/upload/file/".$matches[1][0];
                }
                echo $str;
                
                ?>
                <?php if(isset($downUrl) && $downUrl){ ?>
                <div class="media-r-down">
                    <a href="<?= $downUrl; ?>">点击下载</a>
                </div>
                <?php } ?>
            </div> 
        </div>
        <div class="xq-collegecomments">
        	<div class="xq-collegecomments-tit">学员评论<span>共<i>86</i>评论</span></div>
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
                <input type="hidden" name="Pinglun[type]" value="<?php echo $model->type; ?>">
                <input type="hidden" name="Pinglun[rid]" value="<?= $model->id; ?>">
                <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken; ?>">
                <textarea class="xq-collegecomments-nr" id="content" name="Pinglun[content]" placeholder="请输入要评论的内容"></textarea>
            
            <div class="xq-collegecomments-btn"><input type="submit"  value="发表评论"></div>
            </form>
            <div class="collegecomments-body" id ="comment">
            </div>
        </div>
    </div>
    <?= $this->render('/layouts/_page_right'); ?>
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

$isGuest = Yii::$app->user->isGuest;
$productcommentUrl = Yii::$app->urlManager->createUrl(['resource/comment','id'=>$model->id,'type'=>$model->type]);
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