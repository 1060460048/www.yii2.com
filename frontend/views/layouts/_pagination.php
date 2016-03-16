<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-24 11:09:43
 */
?>
<?=    \common\components\MyLinkPager::widget([
    'pagination' => $pagination,
    'lastPageLabel'=>"尾页",
    'firstPageLabel'=>"首页",
    'prevPageLabel' => '上一页',
    'nextPageLabel' => '下一页',
    'nextPageCssClass' => '',
    'prevPageCssClass' => '',
    'maxButtonCount'=>6,
    'options'=>['class'=>'pages']

]) ?>