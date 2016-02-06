<?php

namespace backend\widgets\pic;

use Yii;
use yii\base\Action;
use common\models\Images;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\web\HttpException;
use yii\web\UploadedFile;

class UploadAction extends Action
{
    public $uploadDir;
    public $upload;
    public $fileName = "imageFiles";
    
    public function run(){
        
        $file = UploadedFile::getInstanceByName($this->fileName);
        
        if ($file->hasError) {
            throw new HttpException(500, 'Upload error');
        }
        
        $this->upload = $this->upload . '/' . date('Ym');
        
        $this->uploadDir = Yii::getAlias('@wwwdir/' . $this->upload . '/');
        
        $newFileName = \common\components\Utils::fileName(5);
     
        if (!file_exists($this->uploadDir)) {
            FileHelper::createDirectory($this->uploadDir);
        }
        
        $fileName = $newFileName.".".$file->extension;

        if (file_exists($this->uploadDir . $fileName)) {
            $fileName = $newFileName . '-' . uniqid() . '.' . $file->extension;
        }
        
        $result = $file->saveAs($this->uploadDir.$fileName);
        
        $response['status'] = 0;
        
        
        if($result){
            //上传成功";写入数据库
            $item = Yii::$app->request->post('item');
            $item_id = Yii::$app->request->post('item_id');
            $image = new Images();
            $image->item = $item;
            $image->item_id = $item_id;
            $image->filename = $fileName;
            $image->image = "/".$this->upload."/".$fileName;
            $image->filename = $fileName;
            $image->sort_order = 50;
            $n = $image->save();
            if($n){
                //$image->
                $response['status'] = 1;
                $response['imgID'] = $image->id;
                $response['filePath'] = "/".$this->upload."/".$fileName;
                $response['initialPreview'] = ["<img src='".$response['filePath']."' class='file-preview-image'>"];
                $response['initialPreviewConfig'] = [
                    [
                        'caption'=>$fileName,
                        'width'=>"120px;",
                        'url'=>Yii::$app->urlManager->createUrl(['services/remove']),
                        'key'=>$image->id,
                        'description'=>"",
                        'sort_order'=>"",
                        //"extra"=> ["id"=>1003333],
                    ],
                ];
            }
            
        }
        return Json::encode($response);
    }
    
}
