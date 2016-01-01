<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-28 18:51:17
 */

$this->registerJsFile("@web/statics/js/jquery-1.4.4.min.js");
$this->registerJsFile("@web/statics/js/jquery.reveal.js");
$this->title = "信息价查询";
?>
<div class="container ">
	<div class="container-left f-l">
    	<?php echo $this->render('/layouts/_breadcrumbs'); ?>
        <?php 
        $year = Yii::$app->request->get('y');
        
        $month = Yii::$app->request->get('m');
        if(!$month){
            $month = date('m',time());
        }
        ?>
     	<dl class="xxj-time">
        	<dt>年份：</dt>
            <dd<?php if(!$year){echo ' class="selected"';} ?>><a href="<?= Yii::$app->urlManager->createUrl(['price/index']); ?>">最新</a></dd>
            <?php
                $currentYear = date('Y',time());
                
                for($i=2015;$i<=$currentYear;$i++){
            ?>
            <dd<?php if($year == $i){echo ' class="selected"';} ?>><a href="?y=<?= $i; ?>"><?= $i; ?>年</a></dd>
            <?php } ?>
      </dl>
        <?php
            
            if($year){ ?>
        <dl class="xxj-time" style="margin-top:0px;">
        	<dt>月份：</dt>
            
            <?php
                $totalMonth = 13;
                if($year == date("Y",time())){
                    $totalMonth = date('m',time()) + 1;
                }
                for($i=1;$i<$totalMonth;$i++){
            ?>
            <dd<?php if($month == $i){echo ' class="selected"';} ?>><a href="?y=<?= $year; ?>&m=<?= $i; ?>"><?= $i; ?>月</a></dd>
            <?php } ?>
      </dl>
       <?php } ?>
      <div class="clear"></div>
      <div class="xxj-xq">
<!--     	<div class="xxj-tit">郑州2015年11月建筑工程信息价</div>
        <div class="xxj-jj">省刊： 一、“河南省工程造价信息指导价格”(以下简称“指导价”)是由河南省建筑工程标准定额站和河南省注册造价工程师协会发布的工程建设材料的指导价格。二、本“指导价”的应用范围和使用方法参见豫建标定(2005)3号文件。三...
        <span><a href="#" class="big-link" data-reveal-id="myModal">[详情]</a></span></div>
        <div id="myModal" class="reveal-modal">
			<h2>编制说明</h2>
			<p>省刊： 一、“河南省工程造价信息指导价格”(以下简称“指导价”)是由河南省建筑工程标准定额站和河南省注册造价工程师协会发布的工程建设材料的指导价格。二、本“指导价”的应用范围和使用方法参见豫建标定(2005)3号文件。三、本价格信息中列出的“指导价”(除特殊指明外)是包含了材料的原价、供销手续费、采购保管费、运杂费及损耗在内的材料的预算价格。并为多家企业的合格产品的综合平均价格，可在工程建设的招标、投标、概算、预算、决算中直接使用。四、本价格信息中所列出的含有品牌或企业名称的价格，是企业的自主品牌报价、所包含的各种费用内容可参照企业的说明。五、本价格信息中的地方材料是按照各地方列出的，其余未指明地域的价格皆为河南省内统一的指导价格。六、本价格信息中砂子，按中粗砂15%、细砂18%、机制砂5%的膨胀系数，综合包含在指导价中。七、本价格信息中列出的各类钢筋及型钢的价格，是按实际重量计算的价格，具体使用中存在的“正、负差”问题，须甲乙双方协商解决。八、本价格信息所列出的各种钢材，除具体指明材质外，皆为热轧碳素结构钢Q195、Q215或Q235的产品。九、本价格信息中商品混凝土报价不含运输费。十、本价格信息中的钢化玻璃、夹层玻璃、防弹玻璃、中空玻璃、LOW-E玻璃中均包含了制作损耗。十一、本价格信息原则上两月发布一次，是两个月的综合平均价格。如本期没有发布的价格，可参考上一期的价格。如遇材料短时间内价格剧烈波动，我们将进行通知处理。十二、本“指导价”在使用中如在问题，请及时与省定额站信息科联系，联系电话：0371-66285318.十三、本“指导价”最终解释权归河南省建筑工程标准定额站</p>
			<a class="close-reveal-modal">&#215;</a>
		</div>-->
        <div class="date-t-option">
        	<div class="search-box f-l ">
                <form action="" method="get" id="searchNameId">
                                    <input name="key" type="text" placeholder="请输入关键字" value="" />
                                    <input name="y" type="hidden" value="<?= $year; ?>" />
                                    <input name="m" type="hidden" value="<?= $month; ?>" />
                                    <a type="submit" href="javascript:void(0);"  onclick="javascript:$('#searchNameId').submit();" class="btn-ser"></a>
                        </form>
						</div>
                        <span class="f-r results-total">
						    
                            信息报价(<?= $year; ?>年<?= $month; ?>月)共
                            <b id="searchCount"><?= $totalItems; ?></b>
							条
<!--    <span class="xxj-fy">
        <a class="page-prev" href="#"  disabled = "true">上一页</a>
		<a class="page-next" href="#" rel="nofollow">下一页</a>
 	</span>-->
</span>
        </div>
        <div class="clear"></div>
        <div class="moudle-date-box">
        	<table id="metrialTable">
                <tr>
                    <th width="1%"></th>
                    <th width="28%">名称</th>
                    <th width="23%">规格/型号</th>
                    <th width="15%" class="txt-c">单位</th>
                    <th width="13%">信息价/元</th>
                    <th width="20%">备注</th>
                </tr>
                <?php foreach ($models as $k => $v): ?>
                <tr>
                    <td  width="10%"></td>
                    <td width="20%">
                        <?= $v->name; ?>
                    </td> 
                    <td  width="20%">
                        <?= $v->guige; ?>
                    </td>
                    <td width="10%" class="txt-c">
                        <?= $v->danwei; ?></td>
                    <td width="20%">
                        <a href="#" class="big-link" data-reveal-id="myModal<?php echo $k; ?>" data-animation="fade">查看信息价</a>
                    </td>
                    <td width="20%">

                    </td>
                </tr>
                
                <div id="myModal<?php echo $k; ?>" class="reveal-modal xxj-ckjg">
                    <p><span class="bt-ys">产品名称:</span><?= $v->name; ?></p>
                    <p><span class="bt-ys">产品规格:</span><?= $v->guige; ?></p>
                     <p><span class="bt-ys">产品单位:</span><?= $v->danwei; ?></p>
                    <?php
                        $price = $v->price;
                        if(Yii::$app->request->get('y') && Yii::$app->request->get('m')){
                            //查找当月的价格
                            $x = $v->getPriceLog($v->id,$year,$month);
                            if($x){
                                $price = $x->price;
                            }
                        }
                    ?>
                     <p><span class="bt-ys">产品价格:</span><label class="jg"><?= $price; ?>元</label></p>
                    <a class="close-reveal-modal">&#215;</a>
                </div>
                <?php endforeach; ?>
            </table>
            
        </div>
     </div>
        <div class="clear"></div>
        <?php echo $this->render('/layouts/_pagination',['pagination'=>$pagination]); ?>
    </div>
    <div class="container-right f-r">
        <?php echo $this->render('/layouts/_pr_kaibanxinxi'); ?>
        <?php echo $this->render('/layouts/_pr_baokaozhinan'); ?>
    </div>
	<div class="clear"></div>
</div>
