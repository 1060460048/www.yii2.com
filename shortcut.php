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
$this->registerJs($js,yii\web\View::POS_END);

/*
 * 获取控制器ID 获取 actionID
 */
echo Yii::$app->controller->id;
echo Yii::$app->controller->action->id;
        
Yii::$app->response->format = Response::FORMAT_JSON;        
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

/*
 * 改动 gridview 按钮组
 */

 ['class' => 'yii\grid\ActionColumn','template' => '{view} {update}',],

//弹出 筛选提示
['class' => 'form-control', 'prompt' => Yii::t('app', 'Please Filter')]

//禁用csrf
public function beforeAction($action)
{            
    if ($action->id == 'yuyue') {
        Yii::$app->controller->enableCsrfValidation = false;
    }

    return parent::beforeAction($action);
}


//列表页 增加 页码到title
$currentPage = $pagination->page + 1;
$this->title = Category::getTitle($cid)."_第".$currentPage."页";
?>

/*
 * 上一篇 下一篇
 */
<li><span>上一篇：</span><?php if(!$prev){echo "暂无";}else{ ?><a href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$prev->id]); ?>"><?= $prev->title; ?></a><?php } ?></li>
<li><span>下一篇：</span><?php if(!$next){echo "暂无";}else{ ?><a href="<?= Yii::$app->urlManager->createUrl(['news/show','id'=>$next->id]); ?>"><?= $next->title; ?></a><?php } ?></li>

$.each(data,function(index,item){
    str = str + "产品名：" + item.name + "&nbsp;&nbsp;";
    str = str + "销售总数：" + item.num + "个&nbsp;&nbsp;";
    str = str + "销售额：" + item.sum + "元&nbsp;&nbsp;";
    str = str + "成本：" + item.chengben + "元&nbsp;&nbsp;";
    str = str + "利润：" + item.lirun + "元<br>";
});

[
    'class' => 'yii\grid\ActionColumn',
    'template' => '{view}{update}{delete}',
],

/*
 * 在线客服QQ
 *
/
http://wpa.qq.com/msgrd?v=3&uin=6232967&site=qq&menu=yes


/*
 *日期时间选择器
 */
require kartik-v/yii2-widget-datepicker "@dev"
    <?= 
        $form->field($model, 'baomingshijian')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => '选择报名时间'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]); 

    ?>
    <?= $form->field($model, 'jiezhishijian')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => '选择报名时间'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]); 
    ?>

<?php
public function beforeSave($insert) {
        
    if(parent::beforeSave($insert)){
        $this->kaoshishijian = strtotime($this->kaoshishijian);
        $this->baomingshijian = strtotime($this->baomingshijian);
        $this->jiezhishijian = strtotime($this->jiezhishijian);
        if(!$this->ord){
            $this->ord = 100;
        }
        return true;
    }
}

public function afterFind() {
    parent::afterFind();
    $this->kaoshishijian = date('Y-m-d',$this->kaoshishijian);
    $this->baomingshijian = date('Y-m-d',$this->baomingshijian);
    $this->jiezhishijian = date('Y-m-d',$this->jiezhishijian);
}

/*
 *移动端适配
 *
 */
session_start();
if(isset($_GET['adapter']) && $_GET['adapter'] == "pc"){
    $_SESSION['showpc'] = true;
    
}elseif(isset ($_SESSION['showpc']) && $_SESSION['showpc']){
    $_SESSION['showpc'] = true;
}else{
    $nowUrl = $_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
    if(strpos($nowUrl, "/mobile") == false){
        $userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
        if(stripos($userAgent,"android")!=FALSE||stripos($userAgent,"ios")!=FALSE||stripos($userAgent,"wp")!=FALSE)
        {
            header("location:/mobile/"); 
        }
    }
}

/*
 *ajax post
 */

$csrf_token = Yii::$app->request->getCsrfToken(); //csrf
//分页数据
$.ajax({
    url: "{$bbsGetReplyUrl}",
    type: "GET",
    dataType: "html",
    success: function(data){
        $("#comments").html(data);
    }
}).fail(function(){
    alert("Error");
});
    
$('#comments').on('click', '.pagination a', function(e){
    e.preventDefault();
    $.ajax({
        url: $(this).attr('href'),
        type: "GET",
        dataType: "html",
        success: function(data){
            $('#comments').html(data);
        }
    }).fail(function(){
        alert("Error");
    });

});
//发表评论
function submitReply(content){
    if(isLogin){
        $.ajax({
            url: "{$bbsReplyUrl}",
            type: "POST",
            data:{content:content,_csrf:"{$csrf_token}"},
            dataType: "json",
            success: function(data){
                if(data.status == 1){
                    $("#comments").html(data);
                    alert("评论发布成功");
                    window.location.reload();
                }else{
                    alert("评论失败");
                }
            }
        });
    }else{
        alert("登录用户才能评论");
    }
}
$query = news::find()
->where('status>='.Status::STATUS_ACTIVE)
->orderBy(new \yii\db\Expression('rand()'))
->limit(2)->all();

['password', 'required',],
['repassword', 'required',],
[['repassword'], 'compare','compareAttribute'=>'password','message'=>'2次密码不一致'],
['password', 'string', 'min' => 6],

//Mysql查询重复值
//查出哪个值重复了
SELECT `word`,count(`word`) as count FROM `lmy_badwords` GROUP BY `word` HAVING count(`word`) >1 ORDER BY count DESC
//但是要一次查询到重复字段的id值，就必须使用子查询了，于是使用下面的语句。
SELECT `id`,`word` 
FROM `lmy_badwords` 
WHERE `word` in ( 
   SELECT `word` 
   FROM `lmy_badwords` 
   GROUP BY `word` HAVING count(`word`) >1
);
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

    <!-- 批量图片上传 view页面 -->
    <style>
        .file-preview-thumbnails img{width:120px; height: 120px;}
    </style>
    <?php
        $uploadedImages = $previewConfig = [];
        if($model->isNewRecord){
            if(!$itemID = Yii::$app->session->get('item_id')){
                $itemID = time();
                Yii::$app->session->set("item_id",$itemID);
            }
        }else{
            $itemID = $model->id;
            
            if($model->images){
                foreach($model->images as $k=>$img){
                    //echo "<img src='"+$img->image+"'>";
                    $uploadedImages[$k] = "<img src='".$img->image."'>";
                    $previewConfig[$k]['caption'] = $img->filename;
                    $previewConfig[$k]['width'] = "120px";
                    $previewConfig[$k]['sort_order'] = $img->sort_order;
                    //$previewConfig[$k]['height'] = "120";
                    $previewConfig[$k]['url'] = Yii::$app->urlManager->createUrl(['services/remove']);
                    $previewConfig[$k]['key'] = $img->id;
                    $previewConfig[$k]['description'] = $img->description?$img->description:"";
                    $previewConfig[$k]['sort_order'] = $img->sort_order?$img->sort_order:"";
                    
                    //$previewConfig[$k]['extra'] = "{id:".$img->id."}";
                }
            }
        }
    ?>
    
    <?= FileInput::widget([
        'model'=>$model,
        'options' => ['accept' => 'image/*','multiple'=>true],
        'pluginOptions' => [
            'uploadUrl' => Url::to(['/services/uploadimage']),
            'uploadExtraData' => [
                'item' => 2,
                'item_id' => $itemID,
            ],
            'maxFileCount' => 10,
            'initialPreview'=> $uploadedImages,
            'initialPreviewConfig'=> $previewConfig,
            'showCaption'=>true,
        ],
        
        'name' => 'imageFiles',
        //'id'=>'fileUpload',
        'pluginEvents' => [
            'filesuccessremove' => "function(event,id) {
                //alert(event[0]);
                //console.log(files);
                //console.log('File batch upload complete');
            }", 
            'fileuploaded'=>"function(event,data,previewId, index){
                //var imgId;
                //imgId = data.response['imgID'];
               // alert(imgId);
                //var previewID = data.previewId;
                //alert(previewId);
                //var x = $('#'+previewId+' img').attr('src');
                //alert(x);
                //$('<input type=textfffff>').insertAfter('#'+previewId+' img');
                //alert(data.response['imgID']);
//                alert(data.extra['id']);
//                alert(data.extra.id);
//                alert(data.extra);
//                for(i in data.response){
//                   alert(i);           //获得属性 
//                   alert(data.response[i]);  //获得属性值
//                }
            }",
        ],
    ]); 
    ?>

    <!-- 批量上传图片结束 -->
    <!-- 批量图片 控制器页面 -->
    use backend\widgets\pic\UploadAction;
    use backend\widgets\pic\RemoveAction;
    public function actions()
    {
        return [
            'uploadimage' => [
                'class' => UploadAction::className(),
                'upload' => 'upload/images',
            ],
            'remove'=>[
                'class' => RemoveAction::className(),
                //'upload' => 'upload/images',
            ]
        ];
    }
    /**
     * Creates a new Cases model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cases();

        if ($model->load(Yii::$app->request->post())) {

            if (isset($_FILES) && $_FILES) {
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                if($model->imageFile){
                    $model->upload();
                }
            }
            
            if($model->save()){
                
                if($itemID = Yii::$app->session->get("item_id")){
                    Yii::$app->session->remove("item_id");
                    \common\models\Images::updateAll(['item_id'=>$model->id], ["item_id"=>$itemID]);
                }
                if (isset(Yii::$app->request->post()['intro'])) {
                    foreach (Yii::$app->request->post()['intro'] as $key => $intro) {
                        \common\models\Images::updateAll(['description' => $intro], ['id' => $key]);
                    }
                }
                if (isset(Yii::$app->request->post()['sort'])) {
                    foreach (Yii::$app->request->post()['sort'] as $key => $order) {
                        \common\models\Images::updateAll(['sort_order' => $order], ['id' => $key]);
                    }
                }
                
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Cases model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if (isset($_FILES) && $_FILES) {
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                if($model->imageFile){
                    $model->upload();
                }
            }
            if($model->save()){
                if (isset(Yii::$app->request->post()['intro'])) {
                    foreach (Yii::$app->request->post()['intro'] as $key => $intro) {
                        \common\models\Images::updateAll(['description' => $intro], ['id' => $key]);
                    }
                }
                if (isset(Yii::$app->request->post()['sort'])) {
                    foreach (Yii::$app->request->post()['sort'] as $key => $order) {
                        \common\models\Images::updateAll(['sort_order' => $order], ['id' => $key]);
                    }
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }



    <!-- 批量图片 控制器页面结束 -->

    public function getImages(){
        return $this->hasMany(Images::className(), ['item_id' => 'id'])->where(['item'=>1])->orderBy(['sort_order' => SORT_ASC]);
    }
    <!-- 批量删除图片 模型页面 -->

    //判断移动端
     <script type="text/javascript">
   var isMobile = {  
        Android: function() {  
            return navigator.userAgent.match(/Android/i) ? true : false;  
        },  
        BlackBerry: function() {  
            return navigator.userAgent.match(/BlackBerry/i) ? true : false;  
        },  
        iOS: function() {  
            return navigator.userAgent.match(/iPhone|iPod/i) ? true : false;  
        },  
        Windows: function() {  
            return navigator.userAgent.match(/IEMobile/i) ? true : false;  
        },  
        any: function() {  
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Windows());  
        },
        iPad :function(){
            return navigator.userAgent.match(/iPad/i)? true : false;
        }
    };// end agent judge
   if(isMobile.any()|| isMobile.iPad()){
      location.href = '/minisite/Campaigns/2015/levinhybrid/m';
   };
</script>
