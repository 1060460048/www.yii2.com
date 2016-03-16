<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Status;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PinglunSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '评论管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pinglun-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php  //echo Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
        <input type="button" class="btn btn-info" value="批量删除" id="MyButton" >
    </p>

    <?php     Pjax::begin();
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\CheckboxColumn'],

            'id',
            'star',
            'content:ntext',
            //'rid',
            [
                'attribute'=>'type',
                'value'=>function ($model) {
                    return \common\models\Labels::getLabel($model->type,"type");
                },
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'type',
                    Yii::$app->params['type'],
                    ['class' => 'form-control', 'prompt' => Yii::t('app', 'Please Filter')]
                ),
            ],
            
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function ($model) {
                    if ($model->status === Status::STATUS_ACTIVE) {
                        $class = 'label-success';
                    } elseif ($model->status === Status::STATUS_DELETED) {
                        $class = 'label-warning';
                    } else {
                        $class = 'label-danger';
                    }

                    return '<span class="label ' . $class . '">' . Status::labels($model->status) . '</span>';
                },
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'status',
                    Status::labels(),
                    ['class' => 'form-control', 'prompt' => Yii::t('app', 'PROMPT_STATUS')]
                )
            ],
            [
                'attribute' => 'created_by',
                'value'=>function ($model) {
                    return isset($model->user)&&$model->user ? $model->user->username : '-';
                },
            ],           
            // 'updated_by',
             'created_at:date',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
        Pjax::end();
    ?>

</div>
<?php
$url = Yii::$app->urlManager->createUrl(['pinglun/delete-multiple']);
$js = <<< JS
$(document).ready(function(){
    $('#MyButton').click(function(){
        var HotId = $('#w1').yiiGridView('getSelectedRows');
        alert(HotId);
        //return false;
        $.ajax({
            type: 'POST',
            url : '{$url}',
            data : {pk: HotId},
            success : function() {
                $.pjax.reload({container:'#w1'});
              //$(this).closest('tr').remove(); //or whatever html you use for displaying rows
            }
        });

    });
});
JS;
$this->registerJs($js, \yii\web\View::POS_READY);

?>