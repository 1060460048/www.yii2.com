<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
//use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "{{%album}}".
 *
 * @property string $id
 * @property string $title
 * @property string $intro
 * @property string $author
 * @property integer $views
 * @property integer $created_at
 * @property integer $updated_at
 */
class Album extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%album}}';
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
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
            [['title'], 'required'],
            [['views', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['intro'], 'string'],
            [['author','image','thumb'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'intro' => '简介',
            'author' => '作者',
            'views' => '点击量',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    /*
     * 关联图集里的图片
     */
    public function getImages(){
        return $this->hasMany(AlbumImage::className(), ['album_id'=>'id']);
    }
    
    /*
     * 获取上一篇
     */
    public function getPrev(){
        return self::find()->where(['and','id<'.$this->id])->one();
    }
    /*
     * 下一篇
     */
    public function getNext(){
        return self::find()->where(['and','id>'.$this->id])->one();
    }
    
}
