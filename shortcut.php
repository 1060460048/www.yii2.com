<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2016-1-1 11:07:37
 */
//注册 js到页面
$this->registerJsFile('@web/statics/layer/layer.js',['depends'=>['frontend\assets\AppAsset']]);

//注册css到页面
$this->registerCssFile('@web/statics/layer/layer.js',['depends'=>['frontend\assets\AppAsset']]);
?>
<?php
//注册js 到页面
$js = <<< JS
        
JS;
$this->registerJs($js);

/*
 * 获取控制器ID 获取 actionID
 */
echo Yii::$app->controller->id;
echo Yii::$app->controller->action->id;
        
        
/*
 * 当期位置
 */     
echo \yii\widgets\Breadcrumbs::widget([
    'homeLink'=>['label'=>'首页','url'=>yii\helpers\Url::to(['site/index']),'template'=>'当前位置：{link}'],
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    //'options' => ['class' => ''],
    'tag' => 'span',
    'itemTemplate' => ' &gt; {link}',
    'activeItemTemplate' => ' &gt; {link}',
]);        

/*
 * referrer 来源页面
 */
Yii::$app->request->referrer;

/*
 * scrfToken
 */
Yii::$app->request->csrfToken;


?>

/*
 * 上一篇 下一篇
 */
<li><span>上一篇：</span><?php if(!$prev){echo "暂无";}else{ ?><a href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$prev->id]); ?>"><?= $prev->title; ?></a><?php } ?></li>
<li><span>下一篇：</span><?php if(!$next){echo "暂无";}else{ ?><a href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$next->id]); ?>"><?= $next->title; ?></a><?php } ?></li>

/*
 * 在线客服QQ
 *
/
http://wpa.qq.com/msgrd?v=3&uin=6232967&site=qq&menu=yes
 

/*
 * 百度地图
 */
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=08E4B06890956817c0e35da83c45afd8"></script>          
<script type="text/javascript">
    // 百度地图API功能
    var sContent ="<b>思睿博途</b><br>郑东新区客文一街10号郑州图书馆<br>电话：0371-55668508";
    var map = new BMap.Map("l-map");
    var point = new BMap.Point(113.75794,34.765111);
    map.centerAndZoom(point, 15);
    map.addControl(new BMap.NavigationControl()); //左上角控件
    map.enableScrollWheelZoom(); //滚动放大
    map.enableKeyboard(); //键盘放大
    var infoWindow = new BMap.InfoWindow(sContent);  // 创建信息窗口对象
    map.openInfoWindow(infoWindow,point); //开启信息窗口
    //document.getElementById("r-result").innerHTML = "信息窗口的内容是：<br />" + infoWindow.getContent();
</script>
//地图选点
http://api.map.baidu.com/lbsapi/creatmap/

