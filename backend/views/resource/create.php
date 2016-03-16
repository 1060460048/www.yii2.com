<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Resource */

$this->title = '添加';
$this->params['breadcrumbs'][] = ['label' => '学习资料管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resource-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
