<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
//use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "{{%jobs}}".
 *
 * @property string $id
 * @property integer $company_id
 * @property string $zhiweiming
 * @property string $gongzuodiqu
 * @property string $zhiweixinzi
 * @property string $xueliyaoqiu
 * @property string $zhaopinrenshu
 * @property string $gongzuoxingzhi
 * @property string $xingbieyaoqiu
 * @property string $gongzuojingyan
 * @property string $jingzhengyoushi
 * @property string $zhiweimiaoshu
 * @property integer $create_at
 * @property integer $updated_at
 * @property integer $status
 */
class Jobs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%jobs}}';
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
            [['company_id', 'zhiweiming'], 'required'],
            [['company_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['zhiweimiaoshu'], 'string'],
            [['zhiweiming', 'gongzuodiqu', 'zhiweixinzi', 'xueliyaoqiu', 'zhaopinrenshu', 'gongzuoxingzhi', 'xingbieyaoqiu', 'gongzuojingyan', 'jingzhengyoushi'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => '招聘企业',
            'zhiweiming' => '职位名称',
            'gongzuodiqu' => '工作地区',
            'zhiweixinzi' => '职位薪资',
            'xueliyaoqiu' => '学历要求',
            'zhaopinrenshu' => '招聘人数',
            'gongzuoxingzhi' => '工作性质',
            'xingbieyaoqiu' => '性别要求',
            'gongzuojingyan' => '工作经验',
            'jingzhengyoushi' => '竞争优势',
            'zhiweimiaoshu' => '职位描述',
            'created_at' => '添加时间',
            'updated_at' => '修改时间',
            'status' => '状态',
        ];
    }
    /*
     * 关联 职位所属企业
     */
    public function getCompany(){
        return $this->hasOne(Company::className(), ['id'=>'company_id']);
    }
}
