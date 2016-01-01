<?php
namespace frontend\controllers;
use yii;
use frontend\components\Controller;
use common\models\Category;
use common\models\News;
use common\models\Status;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
/**
 * Site controller
 */
class SearchController extends Controller
{
    
    public function actionIndex($key = ''){
        if($key == ''){
            header("Content-type:text/html;charset=utf-8");
            echo "<script>alert('请输入关键词！');window.history.go(-1);</script>";
            die;
        }
       
        $where = [
            'and',
            ['like','title',$key],
            'status>='.Status::STATUS_ACTIVE,
        ];
        $query = News::find()->where($where);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['defaultPageSize' => Yii::$app->params['defaultPageSizeProduct']],
            'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]],
        ]);

       
        return $this->render('index', [
            'models' => $dataProvider->getModels(),
            'pagination' => $dataProvider->pagination,
        ]);
        
    }

}
