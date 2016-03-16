<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2016-3-9 16:05:22
 */
$this->registerCssFile('@web/statics/css/style.css',['depends'=>['frontend\assets\AppAsset']]);
$this->title = "关于我们";
$this->params['breadcrumbs'][] = ['label'=>$this->title];
?>
<?= $this->render('/layouts/_breadcrumbs'); ?>
<div class="container-about">
    <?= $model->content; ?>
</div>
