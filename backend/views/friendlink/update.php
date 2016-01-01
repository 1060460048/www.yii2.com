<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Friendlink */

$this->title = '修改: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '链接管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="friendlink-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
