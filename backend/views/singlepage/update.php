<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Singlepage */

$this->title = '修改: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '单页管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="singlepage-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
