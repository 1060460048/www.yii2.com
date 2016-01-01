<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-28 16:01:14
 */
use frontend\assets\SuperSliderAsset;
SuperSliderAsset::register($this);
$this->title = $model->xingming."应聘".$model->yingpingzhiwei;
$this->params['breadcrumbs'][] = ['label'=>'最新简历','url'=>['jianli/index']];
$this->params['breadcrumbs'][] = ['label'=>$this->title];


?>       
<div class="container ">
	<div class="container-left f-l">
    	<?php echo $this->render('/layouts/_breadcrumbs'); ?>
      <div class="detail-nr m-t-20">
        <div class="xq-bt">求职简历</div>
        <div class="time"><span>时间:<?= common\components\Utils::dateFormat($model->created_at,5); ?></span><span>来源：宇斌教育</span><span>阅读数：<?= $model->views; ?>人</span></div>
            <div class="nr-hg">
            	<table class="table table-bordered table-hover table-condensed table-striped" style="width:795px;margin: 0 auto">
        <tbody class="content_main">
            <tr>
                <td width="280px">姓  名</td>
                <td align="left"><?= $model->xingming; ?></td>
            </tr>
            <tr>
                <td>性  别</td>
                <td align="left"><?= $model->xingbie; ?></td>
            </tr>
            <tr>
                <td>年  龄</td>
                <td align="left"><?= $model->nianling; ?></td>
            </tr>
            <tr>
                <td>学  历</td>
                <td align="left"><?= $model->xueli; ?></td>
            </tr>
            <tr>
                <td>相关证书</td>
                <td align="left"><?= $model->xiangguanzhengshu; ?></td>
            </tr>
            <tr>
                <td>应聘职务</td>
                <td align="left"><?= $model->yingpingzhiwei; ?></td>
            </tr>
            <tr>
                <td>期望薪资(元)</td>
                <td align="left"><?= $model->qiwangxinzi; ?></td>
            </tr>
            <tr>
                <td>个人简历</td>
                <td align="left"><?= $model->gerenjianjie; ?></td>
            </tr>
            <tr>
                <td>其他要求</td>
                <td align="left"><?= $model->qitayaoqiu; ?></td>
            </tr>
            <tr>
                <td>联系电话</td>
                <td align="left"><?= $model->lianxidianhua; ?></td>
            </tr>
            <tr>
                <td>发布日期</td>
                <td align="left"><?= common\components\Utils::dateFormat($model->created_at, 0); ?></td>
            </tr>
<!--            <tr>
                <td>截止日期</td>
                <td align="left">2015-12-31</td>
            </tr>-->
            <tr>
                <td colspan="2" class="jg">敬告：此信息由客户自行发布,本网站不对其真实性和有效性负法律上的责任,由它衍生的风险由用户自己承担。</td>
            </tr>
        </tbody>
    </table>
            </div>
            <div class="xian m-t-20"></div>
<!--        <div class="zp-detail">上一篇:<a href="#"><label class="zx-fl" >[求职]</label>宇斌队<label class="zx-m-f-l">应聘</label>
        	    <label class="zx-ys">造价员</label></a></div>
        <div class="zp-detail">下一篇:<a href="#"><label class="zx-fl" >[求职]</label>郑州<label class="zx-m-f-l">应聘</label>
        	    <label class="zx-ys">造价员</label></a></div> -->
             <div class="fhlb" style="margin-top:10px;"><a href="#">返回列表</a></div> 
      </div>
        <div class="clear"></div>
        
     </div>
    <div class="container-right f-r">
       <?php echo $this->render('/layouts/_pr_zhentifabu'); ?>
       <?php echo $this->render('/layouts/_pr_qiuzhi'); ?>
    </div>
     <div class="clear"></div>
</div>