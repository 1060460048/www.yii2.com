<?php

/*
 * @author Lmy
 * QQ:6232967
 * Create at 2015-12-28 18:54:54
 */
namespace frontend\controllers;

use yii;
use common\models\Goods;
use common\models\GoodsPriceLog;
use frontend\components\Controller;
use yii\data\ActiveDataProvider;

class PriceController extends Controller{

    public function actionIndex($cid = ''){
        $key = Yii::$app->request->get('key');
        if($key){
            $where = ['like','name',$key];
        }else{
            $where = [];
        }
        $query = Goods::find()->where($where);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['defaultPageSize' => Yii::$app->params['defaultPageSizeProduct']],
            'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]],
        ]);
        
        return $this->render('index', [
            'models' => $dataProvider->getModels(),
            'pagination' => $dataProvider->pagination,
            'totalItems' => $dataProvider->getTotalCount(),
        ]);
        
    }
}
?>

