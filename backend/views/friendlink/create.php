<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Friendlink */

$this->title = '添加链接';
$this->params['breadcrumbs'][] = ['label' => '链接管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="friendlink-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
