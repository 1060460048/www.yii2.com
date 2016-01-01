<?php
namespace frontend\controllers;

use yii;
use frontend\components\Controller;
use common\models\Jobs;
use common\models\Company;
use common\models\Status;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class JobController extends Controller
{
    /*
     * 照片图集列表
     */
    public function actionIndex(){
        $query = Jobs::find()->where(['status'=>  Status::STATUS_ACTIVE]);
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
        return $this->render('show',[
            'model'=>$model,
        ]);
    }
    
    protected function findModel($id){
        if (($model = Jobs::find()->where(['and','id='.$id,'status='.Status::STATUS_ACTIVE])->One()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('你所查找的网页不存在');
        }
    }
    
    
}
