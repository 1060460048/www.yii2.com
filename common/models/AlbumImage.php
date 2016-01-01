<?php

namespace common\models;

use Yii;
//use yii\behaviors\TimestampBehavior;
//use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "{{%album_image}}".
 *
 * @property integer $id
 * @property integer $album_id
 * @property string $filename
 * @property string $description
 * @property string $image
 * @property string $thumb
 * @property string $origin
 * @property integer $sort_order
 */
class AlbumImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%album_image}}';
    }
    public function behaviors()
    {
        return [
//            [
//                'class' => TimestampBehavior::className(),
//            ],
            //[
            //    'class' => BlameableBehavior::className(),
            //    'updatedByAttribute' => false,
            //],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['album_id'], 'required'],
            [['album_id', 'sort_order'], 'integer'],
            [['filename'], 'string', 'max' => 128],
            [['description', 'image', 'thumb', 'origin'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'album_id' => 'Album ID',
            'filename' => 'Filename',
            'description' => 'Description',
            'image' => 'Image',
            'thumb' => 'Thumb',
            'origin' => 'Origin',
            'sort_order' => 'Sort Order',
        ];
    }
}
