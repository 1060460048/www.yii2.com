<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
//use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "{{%user_course}}".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $type
 * @property integer $rid
 * @property integer $created_at
 * @property integer $updated_at
 */
class UserCourse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_course}}';
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
            [['uid', 'type', 'rid'], 'required'],
            [['uid', 'type', 'rid', 'created_at', 'updated_at'], 'integer']
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
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'type' => 'Type',
            'rid' => 'Rid',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
