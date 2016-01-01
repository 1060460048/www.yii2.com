<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
//use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "{{%kaoshi}}".
 *
 * @property string $id
 * @property string $title
 * @property integer $baomingshijian
 * @property integer $jiezhishijian
 * @property integer $kaoshishijian
 * @property integer $is_reminder
 * @property integer $created_at
 * @property integer $updated_at
 */
class Kaoshi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%kaoshi}}';
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
            [['title', 'kaoshishijian'], 'required'],
            [['is_reminder', 'created_at', 'updated_at','ord'], 'integer'],
            [['title','baomingshijian', 'jiezhishijian', 'kaoshishijian'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '考试名',
            'baomingshijian' => '报名时间',
            'jiezhishijian' => '报名截止时间',
            'kaoshishijian' => '考试时间',
            'is_reminder' => '是否倒计时提醒',
            'ord' => '排序',
            'created_at' => '添加时间',
            'updated_at' => '修改时间',
        ];
    }
    public function beforeSave($insert) {
        
        if(parent::beforeSave($insert)){
            $this->kaoshishijian = strtotime($this->kaoshishijian);
            $this->baomingshijian = strtotime($this->baomingshijian);
            $this->jiezhishijian = strtotime($this->jiezhishijian);
            if(!$this->ord){
                $this->ord = 100;
            }
            return true;
        }
    }
    
    public function afterFind() {
        parent::afterFind();
        $this->kaoshishijian = date('Y-m-d',$this->kaoshishijian);
        $this->baomingshijian = date('Y-m-d',$this->baomingshijian);
        $this->jiezhishijian = date('Y-m-d',$this->jiezhishijian);
    }
}
