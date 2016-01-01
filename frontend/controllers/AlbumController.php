<?php
namespace frontend\controllers;

use yii;
use frontend\components\Controller;
use common\models\Album;
use common\models\AlbumImage;
use common\models\Status;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class AlbumController extends Controller
{
    /*
     * 照片图集列表
     */
    public function actionIndex(){
        $query = Album::find();
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
        
        $prev = $model->getPrev();
        $next = $model->getNext();
        return $this->render('show',[
            'model'=>$model,
            'prev'=>$prev,
            'next'=>$next,
        ]);
    }
    
    protected function findModel($id){
        if (($model = Album::find()->where(['and','id='.$id])->One()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
}
