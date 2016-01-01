<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
//use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "{{%goods_pricelog}}".
 *
 * @property string $id
 * @property integer $goods_id
 * @property integer $year
 * @property integer $month
 * @property integer $day
 * @property integer $price
 * @property integer $created_at
 * @property integer $updated_at
 */
class GoodsPriceLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_pricelog}}';
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
            [['goods_id', 'year', 'month', 'day', 'price'], 'required'],
            [['price'], 'number'],
            [['goods_id', 'year', 'month', 'day', 'created_at', 'updated_at'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'goods_id' => '产品ID',
            'year' => '年',
            'month' => '月',
            'day' => '日',
            'price' => '价格',
            'created_at' => '添加时间',
            'updated_at' => '修改时间',
        ];
    }
}
