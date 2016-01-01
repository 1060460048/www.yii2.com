<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Album */

$this->title = '添加';
$this->params['breadcrumbs'][] = ['label' => '师生风采', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
