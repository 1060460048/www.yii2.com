<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Album */

$this->title = '修改: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '师生风采', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="album-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
