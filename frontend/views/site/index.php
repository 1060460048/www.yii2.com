<?php
/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-23 11:38:18
 */
use frontend\assets\SuperSliderAsset;
use common\models\Category;
SuperSliderAsset::register($this);
$this->title = '首页';
$kaibanxinxi = \common\models\News::getNews(6,5);
?>
<div class="container">
	<div class="first-screen">
        <div class="first-left f-l">
        <div class="all-sort-list">
            <?php 
            function getCatUrl($cate){
                if($cate->redirect_url){
                    return $cate->redirect_url;
                }
                
                return Yii::$app->urlManager->createUrl(['news/index','cid'=>$cate->id]);
            } 
            ?>
            <?php foreach ($bigCate as $k => $v): ?>
            
            <div class="item<?php if($k == 0){echo " bo";} ?>">
                <h3><span><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/pxxm-01.jpg" width="29" height="29" alt=""></span><?= $v->name; ?></h3>
				<div class="item-list clearfix">
				  <div class="close">x</div>
					<div class="subitem">
                        <?php 
                        //获取二级分类
                        $secondCate = Category::find()->where(['parent_id'=>$v->id])->orderBy(['sort_order'=>SORT_ASC])->all();
                        foreach ($secondCate as $kk => $vv): ?>
						<dl class="fore<?php echo $kk+1; ?>">
                            
                            <dt><a href="<?= getCatUrl($vv); ?>"><?= $vv->name; ?></a></dt>
							<dd>
                                <?php 
                                //循环三级分类
                                $thirdCate = Category::find()->where(['parent_id'=>$vv->id])->orderBy(['sort_order'=>SORT_ASC])->all();

                                foreach ($thirdCate as $kkk => $vvv): ?>
                                       
                                <em><a href="<?= getCatUrl($vvv); ?>"><?= $vvv->name; ?></a></em>
                                 <?php endforeach; ?>
                            </dd>
						</dl>
                        <?php endforeach; ?>
						
					</div>
					
				</div>
			</div>
            <?php endforeach; ?>
		</div>
        </div>
        <div class="first-middle f-l">
        	<div class="first-middle-t">
            	<div id="slideBox" class="slideBox">
			<div class="hd">
				<ul>
                    <?php for($i = 0; $i < count($slider); $i++){ ?>
                    <li<?php if($i == 0){ echo ' class="on"';}; ?>><?= $i+1; ?></li>
                    <?php } ?>
                </ul>
			</div>
			<div class="bd">
				<ul>
                    <?php foreach ($slider as $k => $v): ?>
                    <li><a href="<?= $v->url; ?>" target="_blank"><img src="<?= $v->thumb; ?>"></a></li>
					<?php endforeach; ?>
                    
				</ul>
			</div>

			<!-- 下面是前/后按钮代码，如果不需要删除即可 -->
			<a class="prev" href="javascript:void(0)"></a>
			<a class="next" href="javascript:void(0)"></a>

		</div>
        
            </div>
			<div class="first-middle-b">
            	<div class="txtMarquee-left">
			<div class="hd">
				<a class="next"></a>
				<a class="prev"></a>
			</div>
			
            <div class="bd">
				<ul class="infoList">
                    <?php foreach ($kaibanxinxi as $k => $v): ?>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$v->id]); ?>" target="_blank"><?= $v->title; ?></a><span>[<?= \common\components\Utils::dateFormat($v->created_at, 0); ?>]</span></li>
                    <?php endforeach; ?>
				</ul>
			</div>
                    
		</div>
        
            </div>
        </div>
        <div class="first-right f-l">
        	<div class="kstx-tit"><h2>考试提醒</h2></div>
            <div class="kstx-bt">
            	<div class="f-l bt1">考试名称</div>
                <div class="f-l bt1">考试状态</div>
            </div>
            <div class="kstx-nr">
                <?php
                //根据时间判断 要输出的内容
                function getStatus($baomingshijian,$jiezhishijian,$kaoshishijian){
                    $baomingshijian = strtotime($baomingshijian);
                    $jiezhishijian = strtotime($jiezhishijian);
                    $kaoshishijian = strtotime($kaoshishijian);
                    $currenttime = time();
                    //还没开始报名
                    if($baomingshijian > $currenttime){
                        $str = date('m',$baomingshijian)."月".date('d',$baomingshijian)."号报名";
                    }else if(($baomingshijian < $currenttime) && ($currenttime < $jiezhishijian)){
                        //报名截止前的时间
                        $str = date('m',$jiezhishijian)."月".date('d',$jiezhishijian)."号截止报名";
                    }else if($kaoshishijian>$currenttime){
                        //考试前的时间
                        $str = date('m',$kaoshishijian)."月".date('d',$kaoshishijian)."号考试";
                    }else{
                        //已经考试过了
                        $str = "考试已结束！";
                    }
                    return "<span title='考试时间".date("Y-m-d",$kaoshishijian)."'>".$str."</span>";
                }
                //查找考试
                $kaoshi = common\models\Kaoshi::find()->where(['is_reminder'=>0])->orderBy(['ord'=>SORT_ASC])->limit(5)->all();
                foreach($kaoshi as $k=>$v){
                ?>
                <div class="f-l bt2"><?= $v->title; ?></div>
                <div class="f-l bt2"><?= getStatus($v->baomingshijian, $v->jiezhishijian, $v->kaoshishijian); ?></div>
                <?php } ?>
                
            </div>
            <?php 
                    $daojishi = common\models\Kaoshi::find()->where(['is_reminder'=>1])->orderBy(['id'=>SORT_DESC])->one();
                if($daojishi){
                    
            ?>
            <div class="djs">
                <h2><span><?= $daojishi->title; ?></span>倒计时</h2>
                <div class="djs-nr"><?= common\components\Utils::daysbetweendates(strtotime($daojishi->kaoshishijian),time()); ?><span>天</span></div>
            </div>
            <?php } ?>
        </div>
    </div>
 <!--培训班次-->
    <div class="pxbc m-b-20">
    	<div class="pxbc-tit lm-tb">培训班次</div>
    	<ul class="pxbc-nr ">
        	<li><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_20.jpg" alt=""></li>
            <li><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_22.jpg" alt=""></li>
            <li><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_24.jpg" alt=""></li>
            <li><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_26.jpg" alt=""></li>
        </ul>
    </div>
<!--开班信息、综合新闻、网络试听-->
    <div class="kb-zh-wl">
   	  <div class="third-left f-l">
          <div class="kbxx-tit lm-tb"><span><a href="<?= Yii::$app->urlManager->createUrl(['news/index','cid'=>6]); ?>">更多</a></span>开班信息</div>	
            <div class="kbxx-img"><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/kbxx.gif" width="345" height="103" alt=""></div>
            <ul class="kbxx-nr">
                
                <?php if($kaibanxinxi){
                    foreach($kaibanxinxi as $k=>$v):
                 ?>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$v->id]); ?>">土建实训第三期6月8号开班了</a></li> 
                <?php endforeach;}else{ ?>
                <li><a href="#">暂无内容</a></li> 
                <?php } ?>
        </ul>
      </div>
        <div class="third-middle f-l">
        	<div class="zhxw-tit"><h2><a href="#">造价员培训有口皆碑，选择河南宇斌培训，联系黄老师</a></h2></div>
            <dl class="zhxw-nr">
           	  <dt>[报考指南]</dt>
                <dd><a href="#">2015河南造价员资格证书领</a></dd>
                 <dd><a href="#">取通知造价员考试合格标准</a></dd>
                 <dt>[报考指南]</dt>
                <dd><a href="#">2015河南造价员资格证书领</a></dd>
                 <dd><a href="#">取通知造价员考试合格标准</a></dd>
            </dl>
            <div class="zhxw-tit"><h2><a href="#">造价员培训有口皆碑，选择河南宇斌培训，联系黄老师</a></h2></div>
            <dl class="zhxw-nr">
           	  <dt>[报考指南]</dt>
                <dd><a href="#">2015河南造价员资格证书领</a></dd>
                 <dd><a href="#">取通知造价员考试合格标准</a></dd>
                 <dt>[报考指南]</dt>
                <dd><a href="#">2015河南造价员资格证书领</a></dd>
                 <dd><a href="#">取通知造价员考试合格标准</a></dd>
            </dl>
          <div class="zhxw-tit"><h2><a href="#">造价员培训有口皆碑，选择河南宇斌培训，联系黄老师</a></h2></div>
            <dl class="zhxw-nr">
           	  <dt>[报考指南]</dt>
                <dd><a href="#">2015河南造价员资格证书领</a></dd>
                 <dd><a href="#">取通知造价员考试合格标准</a></dd>
                 <dt>[报考指南]</dt>
                <dd><a href="#">2015河南造价员资格证书领</a></dd>
                 <dd><a href="#">取通知造价员考试合格标准</a></dd>
            </dl>
        </div>
        
        <div class="third-right f-l">
            <div class="wlst-tit lm-tb"><span><a href="<?= Yii::$app->urlManager->createUrl(['video/index']); ?>">更多</a></span>网络试听</div>
            <?php $video = \common\models\Video::find()->where(['status'=>  \common\models\Status::STATUS_REC])->one(); ?>
            <?php if($video){ ?>
            <div class="wlst-sp">
                <a href="<?= Yii::$app->urlManager->createUrl(['video/show','id'=>$video->id]); ?>">
                    <img src="<?= $video->content."?vframe/jpg/offset/".$video->thumb; ?>" width="295" height="196" />
                </a>
            </div>
            <div class="wlst-nr">
                <div class="wlst-nr-tit"><a href="<?= Yii::$app->urlManager->createUrl(['video/show','id'=>$video->id]); ?>"><span><input type="button" class="wlst-btn" value="网络试听"></span><?= $video->title; ?></a></div>
            </div>
            <?php }else{echo "暂无视频推荐!";} ?>
        </div>
    </div>
<!--建筑材料信息价，招聘，求职-->    
    <div class="jz-zp-qz m-b-20">
    	<div class="third-left f-l">
            <div class="kbxx-tit lm-tb"><span><a href="<?= Yii::$app->urlManager->createUrl(['price/index']); ?>">更多</a></span>建筑材料信息价</div>	
            <ul class="kbxx-nr">
                <?php $goods = \common\models\Goods::find()->orderBy(['updated_at'=>SORT_DESC])->limit(11)->all(); ?>
                <?php foreach ($goods as $k => $v): ?>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['price/index','key'=>$v->name]); ?>"><?= date("Y",$v->updated_at); ?>年<?= date("m",$v->updated_at); ?>月<?= $v->name; ?>最新报价</a></li>
                <?php endforeach; ?>
            </ul>
      </div>
      <div class="third-middle f-l">
          <div class="zxzp-tit lm-tb"><span><a href="<?= Yii::$app->urlManager->createUrl(['job/index']); ?>">更多</a></span>最新招聘</div>
        <ul class="zxzp-nr">
            <?php 
            //读取招聘信息
            $jobs = common\models\Jobs::find()->where('status>0')->orderBy(['id'=>SORT_DESC])->limit(11)->all();
            ?>
            <?php foreach ($jobs as $k => $v): ?>
            <li><a href="<?= Yii::$app->urlManager->createUrl(['job/show','id'=>$v->id]); ?>"><span><?= common\components\Utils::dateFormat($v->created_at,0); ?></span>
        	    <label class="zx-fl">[招聘]</label>
                    <?= $v->company->name; ?>
       	    <label class="zx-m-f-l">诚招</label>
            <label class="zx-ys"><?= $v->zhiweiming; ?></label>
        	</a>
            </li>
            <?php endforeach; ?>
        </ul>	
      </div>
      <div class="third-right f-l">
          <div class="zxqz-tit lm-tb"><span><a href="<?= Yii::$app->urlManager->createUrl(['jianli/index']); ?>">更多</a></span>最新求职</div>
        <ul class="zxzp-nr">
            <?php 
            //读取求职信息
            $jianli = common\models\Jianli::find()->orderBy(['id'=>SORT_DESC])->limit(11)->all();
            ?>
            <?php foreach ($jianli as $k => $v): ?>
            <li><a href="<?= Yii::$app->urlManager->createUrl(['jianli/show','id'=>$v->id]); ?>"><span><?= common\components\Utils::dateFormat($v->created_at,0); ?></span>
        	    <label class="zx-fl">[求职]</label>
                    <?= $v->xingming; ?>
       	    <label class="zx-m-f-l">应聘</label>
            <label class="zx-ys"><?= $v->yingpingzhiwei; ?></label>
        	</a></li>
            <?php endforeach; ?>
            
        </ul>	
      </div>
    </div>
    <!--广告01-->
    <div class="ad01">
        <?php
            $ads = \common\models\Ads::find()->where(['id'=>1])->one();
            if($ads){
        ?>
        <a href="<?= $ads->url; ?>" target="_blank"><img src="<?php echo $ads->thumb; ?>" width="1170" height="91" alt=""></a>
        <div class="clear"></div>
            <?php } ?>
       
    </div>
    <!--培训项目相关-->
    <div class="pxxmxg clear">
    	<div class="pxxm-left f-l">
        	<div class="pxxm-zt">
            	<div class="slideTxtBox f-l " id="xm-01">
			<div class="hd">
				<ul><li class="on">造价工程师</li><li>造价员</li></ul>
			</div>
			<div class="bd">
				<ul class="pxxm-nr">
                	<li>
                    	<div class="pxxm-nr-body">
                        	<div class="pxxm-nr-body-top">
                            	<div class="pxxm-nr-body-top-l f-l"><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_50.jpg" width="180" height="110" alt=""></div>
                                <div class="pxxm-nr-body-top-r f-l">
                                	<div class="pxxm-nr-body-top-r-tit">河南2016造价工程师考试条件....</div>
                                    <div class="pxxm-nr-body-top-r-nr"><a href="#">这里是河南2016造价工程师新闻的简单摘要，这里是河南2016造价工程师新闻的简单摘要……<span>[详细]</span></a></div>
                                </div>
                            </div>
                            <ul class="pxxm-nr-zt">
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">中国打破了世界软件巨头规则</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">口语：会说中文就能说英语！</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">农场摘菜不如在线学外语好玩</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">数理化老师竟也看学习资料？</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">学英语送ipad2,45天突破听说</a></li>
                            </ul>
                        </div>
                    </li>
				</ul>
				<ul class="pxxm-nr" style="display: none;">
                	<li>
                    	<div class="pxxm-nr-body">
                        	<div class="pxxm-nr-body-top">
                            	<div class="pxxm-nr-body-top-l f-l"><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_50.jpg" width="180" height="110" alt=""></div>
                                <div class="pxxm-nr-body-top-r f-l">
                                	<div class="pxxm-nr-body-top-r-tit">河南2016造价工程师考试条件....</div>
                                    <div class="pxxm-nr-body-top-r-nr"><a href="#">这里是河南2016造价工程师新闻的简单摘要，这里是河南2016造价工程师新闻的简单摘要……<span>[详细]</span></a></div>
                                </div>
                            </div>
                            <ul class="pxxm-nr-zt">
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">中国打破了世界软件巨头规则</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">口语：会说中文就能说英语！</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">农场摘菜不如在线学外语好玩</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">数理化老师竟也看学习资料？</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">学英语送ipad2,45天突破听说</a></li>
                            </ul>
                        </div>
                    </li>
				</ul>
			</div>
		</div>
        <div class="slideTxtBox f-l " id="xm-02">
			<div class="hd">
				<ul><li class="on">造价工程师</li><li>造价员</li></ul>
			</div>
			<div class="bd">
				<ul class="pxxm-nr">
                	<li>
                    	<div class="pxxm-nr-body">
                        	<div class="pxxm-nr-body-top">
                            	<div class="pxxm-nr-body-top-l f-l"><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_50.jpg" width="180" height="110" alt=""></div>
                                <div class="pxxm-nr-body-top-r f-l">
                                	<div class="pxxm-nr-body-top-r-tit">河南2016造价工程师考试条件....</div>
                                    <div class="pxxm-nr-body-top-r-nr"><a href="#">这里是河南2016造价工程师新闻的简单摘要，这里是河南2016造价工程师新闻的简单摘要……<span>[详细]</span></a></div>
                                </div>
                            </div>
                            <ul class="pxxm-nr-zt">
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">中国打破了世界软件巨头规则</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">口语：会说中文就能说英语！</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">农场摘菜不如在线学外语好玩</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">数理化老师竟也看学习资料？</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">学英语送ipad2,45天突破听说</a></li>
                            </ul>
                        </div>
                    </li>
				</ul>
				<ul class="pxxm-nr" style="display: none;">
                	<li>
                    	<div class="pxxm-nr-body">
                        	<div class="pxxm-nr-body-top">
                            	<div class="pxxm-nr-body-top-l f-l"><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_50.jpg" width="180" height="110" alt=""></div>
                                <div class="pxxm-nr-body-top-r f-l">
                                	<div class="pxxm-nr-body-top-r-tit">河南2016造价工程师考试条件....</div>
                                    <div class="pxxm-nr-body-top-r-nr"><a href="#">这里是河南2016造价工程师新闻的简单摘要，这里是河南2016造价工程师新闻的简单摘要……<span>[详细]</span></a></div>
                                </div>
                            </div>
                            <ul class="pxxm-nr-zt">
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">中国打破了世界软件巨头规则</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">口语：会说中文就能说英语！</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">农场摘菜不如在线学外语好玩</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">数理化老师竟也看学习资料？</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">学英语送ipad2,45天突破听说</a></li>
                            </ul>
                        </div>
                    </li>
				</ul>
			</div>
		</div>
        <div class="slideTxtBox f-l " id="xm-03">
			<div class="hd">
				<ul><li class="on">造价工程师</li><li>造价员</li></ul>
			</div>
			<div class="bd">
				<ul class="pxxm-nr">
                	<li>
                    	<div class="pxxm-nr-body">
                        	<div class="pxxm-nr-body-top">
                            	<div class="pxxm-nr-body-top-l f-l"><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_50.jpg" width="180" height="110" alt=""></div>
                                <div class="pxxm-nr-body-top-r f-l">
                                	<div class="pxxm-nr-body-top-r-tit">河南2016造价工程师考试条件....</div>
                                    <div class="pxxm-nr-body-top-r-nr"><a href="#">这里是河南2016造价工程师新闻的简单摘要，这里是河南2016造价工程师新闻的简单摘要……<span>[详细]</span></a></div>
                                </div>
                            </div>
                            <ul class="pxxm-nr-zt">
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">中国打破了世界软件巨头规则</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">口语：会说中文就能说英语！</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">农场摘菜不如在线学外语好玩</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">数理化老师竟也看学习资料？</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">学英语送ipad2,45天突破听说</a></li>
                            </ul>
                        </div>
                    </li>
				</ul>
				<ul class="pxxm-nr" style="display: none;">
                	<li>
                    	<div class="pxxm-nr-body">
                        	<div class="pxxm-nr-body-top">
                            	<div class="pxxm-nr-body-top-l f-l"><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_50.jpg" width="180" height="110" alt=""></div>
                                <div class="pxxm-nr-body-top-r f-l">
                                	<div class="pxxm-nr-body-top-r-tit">河南2016造价工程师考试条件....</div>
                                    <div class="pxxm-nr-body-top-r-nr"><a href="#">这里是河南2016造价工程师新闻的简单摘要，这里是河南2016造价工程师新闻的简单摘要……<span>[详细]</span></a></div>
                                </div>
                            </div>
                            <ul class="pxxm-nr-zt">
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">中国打破了世界软件巨头规则</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">口语：会说中文就能说英语！</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">农场摘菜不如在线学外语好玩</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">数理化老师竟也看学习资料？</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">学英语送ipad2,45天突破听说</a></li>
                            </ul>
                        </div>
                    </li>
				</ul>
			</div>
		</div>
        <div class="slideTxtBox f-l " id="xm-04">
			<div class="hd">
				<ul><li class="on">造价工程师</li><li>造价员</li></ul>
			</div>
			<div class="bd">
				<ul class="pxxm-nr">
                	<li>
                    	<div class="pxxm-nr-body">
                        	<div class="pxxm-nr-body-top">
                            	<div class="pxxm-nr-body-top-l f-l"><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_50.jpg" width="180" height="110" alt=""></div>
                                <div class="pxxm-nr-body-top-r f-l">
                                	<div class="pxxm-nr-body-top-r-tit">河南2016造价工程师考试条件....</div>
                                    <div class="pxxm-nr-body-top-r-nr"><a href="#">这里是河南2016造价工程师新闻的简单摘要，这里是河南2016造价工程师新闻的简单摘要……<span>[详细]</span></a></div>
                                </div>
                            </div>
                            <ul class="pxxm-nr-zt">
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">中国打破了世界软件巨头规则</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">口语：会说中文就能说英语！</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">农场摘菜不如在线学外语好玩</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">数理化老师竟也看学习资料？</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">学英语送ipad2,45天突破听说</a></li>
                            </ul>
                        </div>
                    </li>
				</ul>
				<ul class="pxxm-nr" style="display: none;">
                	<li>
                    	<div class="pxxm-nr-body">
                        	<div class="pxxm-nr-body-top">
                            	<div class="pxxm-nr-body-top-l f-l"><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_50.jpg" width="180" height="110" alt=""></div>
                                <div class="pxxm-nr-body-top-r f-l">
                                	<div class="pxxm-nr-body-top-r-tit">河南2016造价工程师考试条件....</div>
                                    <div class="pxxm-nr-body-top-r-nr"><a href="#">这里是河南2016造价工程师新闻的简单摘要，这里是河南2016造价工程师新闻的简单摘要……<span>[详细]</span></a></div>
                                </div>
                            </div>
                            <ul class="pxxm-nr-zt">
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">中国打破了世界软件巨头规则</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">口语：会说中文就能说英语！</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">农场摘菜不如在线学外语好玩</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">数理化老师竟也看学习资料？</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">学英语送ipad2,45天突破听说</a></li>
                            </ul>
                        </div>
                    </li>
				</ul>
			</div>
		</div>
        <div class="slideTxtBox f-l " id="xm-05">
			<div class="hd">
				<ul><li class="on">造价工程师</li><li>造价员</li></ul>
			</div>
			<div class="bd">
				<ul class="pxxm-nr">
                	<li>
                    	<div class="pxxm-nr-body">
                        	<div class="pxxm-nr-body-top">
                            	<div class="pxxm-nr-body-top-l f-l"><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_50.jpg" width="180" height="110" alt=""></div>
                                <div class="pxxm-nr-body-top-r f-l">
                                	<div class="pxxm-nr-body-top-r-tit">河南2016造价工程师考试条件....</div>
                                    <div class="pxxm-nr-body-top-r-nr"><a href="#">这里是河南2016造价工程师新闻的简单摘要，这里是河南2016造价工程师新闻的简单摘要……<span>[详细]</span></a></div>
                                </div>
                            </div>
                            <ul class="pxxm-nr-zt">
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">中国打破了世界软件巨头规则</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">口语：会说中文就能说英语！</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">农场摘菜不如在线学外语好玩</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">数理化老师竟也看学习资料？</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">学英语送ipad2,45天突破听说</a></li>
                            </ul>
                        </div>
                    </li>
				</ul>
				<ul class="pxxm-nr" style="display: none;">
                	<li>
                    	<div class="pxxm-nr-body">
                        	<div class="pxxm-nr-body-top">
                            	<div class="pxxm-nr-body-top-l f-l"><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_50.jpg" width="180" height="110" alt=""></div>
                                <div class="pxxm-nr-body-top-r f-l">
                                	<div class="pxxm-nr-body-top-r-tit">河南2016造价工程师考试条件....</div>
                                    <div class="pxxm-nr-body-top-r-nr"><a href="#">这里是河南2016造价工程师新闻的简单摘要，这里是河南2016造价工程师新闻的简单摘要……<span>[详细]</span></a></div>
                                </div>
                            </div>
                            <ul class="pxxm-nr-zt">
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">中国打破了世界软件巨头规则</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">口语：会说中文就能说英语！</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">农场摘菜不如在线学外语好玩</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">数理化老师竟也看学习资料？</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">学英语送ipad2,45天突破听说</a></li>
                            </ul>
                        </div>
                    </li>
				</ul>
			</div>
		</div>
        <div class="slideTxtBox f-l " id="xm-06">
			<div class="hd">
				<ul><li class="on">造价工程师</li><li>造价员</li></ul>
			</div>
			<div class="bd">
				<ul class="pxxm-nr">
                	<li>
                    	<div class="pxxm-nr-body">
                        	<div class="pxxm-nr-body-top">
                            	<div class="pxxm-nr-body-top-l f-l"><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_50.jpg" width="180" height="110" alt=""></div>
                                <div class="pxxm-nr-body-top-r f-l">
                                	<div class="pxxm-nr-body-top-r-tit">河南2016造价工程师考试条件....</div>
                                    <div class="pxxm-nr-body-top-r-nr"><a href="#">这里是河南2016造价工程师新闻的简单摘要，这里是河南2016造价工程师新闻的简单摘要……<span>[详细]</span></a></div>
                                </div>
                            </div>
                            <ul class="pxxm-nr-zt">
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">中国打破了世界软件巨头规则</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">口语：会说中文就能说英语！</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">农场摘菜不如在线学外语好玩</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">数理化老师竟也看学习资料？</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">学英语送ipad2,45天突破听说</a></li>
                            </ul>
                        </div>
                    </li>
				</ul>
				<ul class="pxxm-nr" style="display: none;">
                	<li>
                    	<div class="pxxm-nr-body">
                        	<div class="pxxm-nr-body-top">
                            	<div class="pxxm-nr-body-top-l f-l"><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_50.jpg" width="180" height="110" alt=""></div>
                                <div class="pxxm-nr-body-top-r f-l">
                                	<div class="pxxm-nr-body-top-r-tit">河南2016造价工程师考试条件....</div>
                                    <div class="pxxm-nr-body-top-r-nr"><a href="#">这里是河南2016造价工程师新闻的简单摘要，这里是河南2016造价工程师新闻的简单摘要……<span>[详细]</span></a></div>
                                </div>
                            </div>
                            <ul class="pxxm-nr-zt">
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">中国打破了世界软件巨头规则</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">口语：会说中文就能说英语！</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">农场摘菜不如在线学外语好玩</a></li>
                                <li><span class="date">2011-11-11</span><a href="#" target="_blank">数理化老师竟也看学习资料？</a></li>
                                <li class="pxxm-ys"><span class="date">2011-11-11</span><a href="#" target="_blank">学英语送ipad2,45天突破听说</a></li>
                            </ul>
                        </div>
                    </li>
				</ul>
			</div>
		</div>
       
    		
            </div>
        </div>
<!--右侧相关-->
        <div class="pxxm-right f-r">
<!--热门专题-->  
            <div class="rmzt">
                <div class="rmzt-tit lm-tb"><span><a href="<?= Yii::$app->urlManager->createUrl(['news/index','cid'=>9]); ?>">更多</a></span>热门专题</div>	
                <div><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_47.jpg" width="290" height="131" alt=""></div>
                <ul class="kbxx-nr">
                    <?php 
                        $remenzhuanti = \common\models\News::getNews(9, 5);
                        foreach($remenzhuanti as $k=>$v){
                    ?>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$v->id]); ?>"><?= $v->title; ?></a></li>
                    <?php } ?>
                </ul>	
            </div>
          <div class="rmzt">
              <div class="rmzt-tit lm-tb"><span><a href="<?= Yii::$app->urlManager->createUrl(['news/index','cid'=>8]); ?>">更多</a></span>报考指南</div>	
            <div><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_55.jpg" width="280" height="104" alt=""></div>
            <ul class="kbxx-nr">
                <?php 
                    $baokaozhinan = \common\models\News::getNews(8, 5);
                    foreach($baokaozhinan as $k=>$v){
                ?>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$v->id]); ?>"><?= $v->title; ?></a></li>
                <?php } ?>
  
            </ul>	
            </div> 
          <div class="rmzt">
              <div class="rmzt-tit lm-tb"><span><a href="<?= Yii::$app->urlManager->createUrl(['file-download/index']); ?>">更多</a></span>资料下载</div>	
            <div><img src="<?php echo Yii::$app->params['staticsPath']; ?>images/yubin_58.jpg" width="286" height="101" alt=""></div>
            <ul class="zlxz-nr">
                <?php 
                    $wenjian = \common\models\FileDownload::find()->orderBy(['created_at'=>SORT_DESC])->limit(5)->all();
                    foreach($wenjian as $k=>$v){
                ?>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['file-download/index','id'=>$v->id]); ?>"><?= $v->title; ?></a></li>
                <?php } ?>
            </ul>	
            </div>      	     	      	
        </div>
        <div class=" clear"></div>
    </div>
 <!--师生风采-->
  <div class="pxbc m-b-20">
      <div class="pxbc-tit lm-tb"><span><a href="<?= Yii::$app->urlManager->createUrl(['album/index']); ?>">更多</a></span>师生风采</div>
   	<ul class="ssfc-nr ">
        <?php foreach ($teachers as $k => $v): ?>
        <li><a href="<?= Yii::$app->urlManager->createUrl(['album/show','id'=>$v->id]); ?>"><img src="<?php echo $v->thumb; ?>" width="218" height="147" alt=""></a></li>
        <?php endforeach; ?>
        </ul>
  </div>
<!--友情链接-->
  <div class="yqlj">
    	<div class="yqlj-tit">友情链接</div>
    <div class="yqlj-nr">
        <?php foreach ($friendlink as $k => $v): ?>
        <a href="<?= $v->link; ?>" target="_blank"><span>建材网</span></a>
        <?php endforeach; ?>     
    </div>
    </div>
    <div class="ad01">
        <?php
            $ads = \common\models\Ads::find()->where(['id'=>2])->one();
            if($ads){
        ?>
        <a href="<?= $ads->url; ?>" target="_blank"><img src="<?php echo $ads->thumb; ?>" width="1170" height="69" alt=""></a>
            <?php } ?>
    </div>
</div>
<?php 
$js = <<< JS
         var ary = location.href.split("&");
		jQuery(".slideBox").slide( { mainCell:".bd ul", effect:ary[1],autoPlay:ary[2],trigger:ary[3],easing:ary[4],delayTime:ary[5],mouseOverStop:ary[6],pnLoop:ary[7] });
        jQuery(".txtMarquee-left").slide({mainCell:".bd ul",autoPlay:true,effect:"leftMarquee",vis:2,interTime:50});
        jQuery(".slideTxtBox").slide();
        $('.all-sort-list > .item').hover(function(){
			var eq = $('.all-sort-list > .item').index(this),				//获取当前滑过是第几个元素
				h = $('.all-sort-list').offset().top,						//获取当前下拉菜单距离窗口多少像素
				s = $(window).scrollTop(),									//获取游览器滚动了多少高度
				i = $(this).offset().top,									//当前元素滑过距离窗口多少像素
				item = $(this).children('.item-list').height(),				//下拉菜单子类内容容器的高度
				sort = $('.all-sort-list').height();						//父类分类列表容器的高度
			
			if ( item < sort ){												//如果子类的高度小于父类的高度
				if ( eq == 0 ){
					$(this).children('.item-list').css('top', (i-h));
				} else {
					$(this).children('.item-list').css('top', (i-h)+1);
				}
			} else {
				if ( s > h ) {												//判断子类的显示位置，如果滚动的高度大于所有分类列表容器的高度
					if ( i-s > 0 ){											//则 继续判断当前滑过容器的位置 是否有一半超出窗口一半在窗口内显示的Bug,
						$(this).children('.item-list').css('top', (s-h)+2 );
					} else {
						$(this).children('.item-list').css('top', (s-h)-(-(i-s))+2 );
					}
				} else {
					$(this).children('.item-list').css('top', 3 );
				}
			}	

			$(this).addClass('hover');
			$(this).children('.item-list').css('display','block');
		},function(){
			$(this).removeClass('hover');
			$(this).children('.item-list').css('display','none');
		});

		$('.item > .item-list > .close').click(function(){
			$(this).parent().parent().removeClass('hover');
			$(this).parent().hide();
		});
JS;
$this->registerJs($js);
?>