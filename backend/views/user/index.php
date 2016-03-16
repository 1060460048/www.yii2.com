<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo  Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
        <!--<input type="button" class="btn btn-info" value="批量删除" id="MyButton" >-->
    </p>

    <?php     Pjax::begin();
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            //['class' => 'yii\grid\CheckboxColumn'],

            'id',
            'username',
            'truename',
            'phone',
            //'auth_key',
            // 'password_hash',
            // 'password_reset_token',
             'email:email',
            // 'avatar',
            // 'address',
            // 'status',
             'created_at:datetime',
            // 'updated_at',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
        Pjax::end();
    ?>

</div>
<?php
$url = Yii::$app->urlManager->createUrl(['user/delete-multiple']);
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