<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-24 11:09:43
 */
?>
<div class="fy">
    <?= \yii\widgets\LinkPager::widget([
        'pagination' => $pagination,
        'lastPageLabel'=>'尾页',
        'firstPageLabel'=>'首页',
        'prevPageLabel' => '上一页',
        'nextPageLabel' => '下一页',

    ]) ?>

</div>

