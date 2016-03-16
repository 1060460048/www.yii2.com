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
class NewsController extends Controller
{
   
    public function actionIndex($cid = 1){
        $allCategory = Category::find()->asArray()->all();
        $arrayCategoryIdName = ArrayHelper::map($allCategory, 'id', 'name');
        $arrSubCat = Category::getArraySubCatalogId($cid, $allCategory);
        $where = [
            'and',
            ['category_id'=>$arrSubCat],
            'status>='.Status::STATUS_ACTIVE,
        ];
        $query = News::find()->where($where);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['defaultPageSize' => 8],
            'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]],
        ]);
        
        return $this->render('index', [
            'models' => $dataProvider->getModels(),
            'pagination' => $dataProvider->pagination,
            'cid' => $cid,
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
        if (($model = News::find()->where(['and','id='.$id,'status>='.Status::STATUS_ACTIVE])->One()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
}
