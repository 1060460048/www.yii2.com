<?php

namespace backend\widgets\image;

use Yii;
use common\models\AlbumImage;
use yii\base\Action;

class RemoveAction extends Action
{
    public $uploadDir = '@webroot/upload';

    public function run($id)
    {
        $image = AlbumImage::findOne(['id' => $id]);
        if ($image) {
            $filename = $image->image;
            $thumbname = $image->thumb;
            if (AlbumImage::deleteAll(['id' => $id])) {
                if (unlink(\Yii::getAlias($this->uploadDir . $filename))) {
                    if (unlink(\Yii::getAlias($this->uploadDir . $thumbname))) {
                        Yii::$app->response->redirect(Yii::$app->request->referrer);
                    }
                }
            }
        }

        return false;
    }
}
