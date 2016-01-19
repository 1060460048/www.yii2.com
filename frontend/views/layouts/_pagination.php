<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-24 11:09:43
 */
?>
<?=    \common\components\MyLinkPager::widget([
    'pagination' => $pagination,
    'lastPageLabel'=>false,
    'firstPageLabel'=>false,
    'prevPageLabel' => '上一页',
    'nextPageLabel' => '下一页',
    'nextPageCssClass' => '',
    'prevPageCssClass' => '',
    'maxButtonCount'=>0,
    'options'=>['class'=>'page']

]) ?>