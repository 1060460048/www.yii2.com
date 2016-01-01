<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Singlepage */

$this->title = '新增单页面';
$this->params['breadcrumbs'][] = ['label' => '单页面管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="singlepage-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
