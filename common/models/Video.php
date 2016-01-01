<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
//use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "{{%video}}".
 *
 * @property string $id
 * @property string $title
 * @property string $thumb
 * @property string $keyword
 * @property string $content
 * @property string $author
 * @property integer $status
 * @property integer $views
 * @property integer $created_at
 * @property integer $updated_at
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%video}}';
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
            [['title', 'content'], 'required'],
            [['content'], 'string'],
            [['status', 'views', 'created_at', 'updated_at'], 'integer'],
            [['title', 'keyword'], 'string', 'max' => 100],
            [['thumb'], 'string', 'max' => 120],
            [['author'], 'string', 'max' => 30]
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
            'thumb' => '缩略图',
            'keyword' => '关键词',
            'content' => '内容',
            'author' => '作者',
            'status' => '状态',
            'views' => '浏览次数',
            'created_at' => '添加时间',
            'updated_at' => '修改时间',
        ];
    }
}
