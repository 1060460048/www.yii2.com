<?php

namespace backend\controllers;

use Yii;
use common\models\Ads;
use common\models\AdsSearch;
use backend\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * AdsController implements the CRUD actions for Ads model.
 */
class AdsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Ads models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ads model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Ads model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ads();
        
        
        if ($model->load(Yii::$app->request->post())) {

            if (isset($_FILES) && $_FILES) {
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                if($model->imageFile){
                    $model->upload();
                }
            }
            $model->start_time = strtotime($model->start_time);
            $model->end_time = strtotime($model->end_time);
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                var_dump($model);
            }
        } 
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ads model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            
            if (isset($_FILES) && $_FILES) {
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                if($model->imageFile){
                    $model->upload();
                }
            }
            $model->start_time = strtotime($model->start_time);
            $model->end_time = strtotime($model->end_time);
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }else {
            $model->start_time = date("Y-m-d H:i",$model->start_time);
            $model->end_time = date("Y-m-d H:i",$model->end_time);
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ads model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ads model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Ads the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ads::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
