<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "{{%pinglun}}".
 *
 * @property string $id
 * @property integer $star
 * @property string $content
 * @property integer $type
 * @property integer $rid
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 */
class Pinglun extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pinglun}}';
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
            [
                'class' => BlameableBehavior::className(),
                //'updatedByAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['star', 'type', 'rid', 'created_by', 'updated_by', 'created_at', 'updated_at','status'], 'integer'],
            [['content', 'type', 'rid', 'created_by'], 'required'],
            [['content'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'star' => '星级',
            'content' => '内容',
            'type' => '类型',
            'rid' => 'ID',
            'status' => '状态',
            'created_by' => '发布人',
            'updated_by' => '修改人',
            'created_at' => '添加时间',
            'updated_at' => '修改时间',
        ];
    }
     /*
     * 根据id获取微课
     */
    public function getWeike(){
        return $this->hasOne(Video::className(), ['id'=>'rid']);
    }
    /*
        * 根据其他课程资源
     */
    public function getResource($type,$rid){
        return Resource::find()->where(['and',['id'=>$rid],['type'=>$type]])->one();
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
    
}
