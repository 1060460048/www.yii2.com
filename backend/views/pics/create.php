<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Pics */

$this->title = '新增图片';
$this->params['breadcrumbs'][] = ['label' => '图片管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pics-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
