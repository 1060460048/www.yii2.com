<?php
namespace frontend\controllers;

use yii;
use frontend\components\Controller;
use common\models\Jianli;
use common\models\Status;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class JianliController extends Controller
{
    /*
     * 照片图集列表
     */
    public function actionIndex(){
        $query = Jianli::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>['defaultOrder'=>['created_at'=>SORT_DESC]],
        ]);
        return $this->render('index', [
            'models' => $dataProvider->getModels(),
            'pagination' => $dataProvider->pagination,
        ]);
        
    }
    
    
    public function actionShow($id = 1){
        $model = $this->findModel($id);
        $model->views += 1;
        $model->save();
       
        return $this->render('show',[
            'model'=>$model,
        ]);
    }
    
    protected function findModel($id){
        if (($model = Jianli::find()->where(['and','id='.$id])->One()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('你所查找的网页不存在');
        }
    }
    
    
}
