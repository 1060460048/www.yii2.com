<?php

namespace backend\widgets\pic;

use Yii;
use common\models\Images;
use yii\base\Action;

class RemoveAction extends Action
{
    
    public function run()
    {
        $id = Yii::$app->request->post('key'); // Array or selected records primary keys
        $image = Images::findOne(['id' => $id]);
        if ($image) {
            $filename = $image->image;
            //$thumbname = $image->thumb;
            if (Images::deleteAll(['id' => $id])) {
                if(file_exists(\Yii::getAlias("@wwwdir" . $filename))){
                    unlink(\Yii::getAlias("@wwwdir" . $filename));
                }
            }
        }
        echo "1";
        //return false;
    }
}
