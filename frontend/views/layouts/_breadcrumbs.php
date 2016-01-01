<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-24 11:09:21
 */

echo \yii\widgets\Breadcrumbs::widget([
                'homeLink'=>['label'=>'首页','url'=>yii\helpers\Url::to(['site/index']),'template'=>'当前位置：{link}'],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'options' => ['class' => 'dqwz'],
                'tag' => 'div',
                'itemTemplate' => ' &gt; {link}',
                'activeItemTemplate' => ' &gt; {link}',
            ])

?>

