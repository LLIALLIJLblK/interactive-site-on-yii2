<?php


namespace frontend\models;

use yii\base\Model;
use yii\db\ActiveRecord;

class PriceList extends ActiveRecord{

    public static function tableName()
    {
        return 'priceList';
    }
    public static function primaryKey()
    {
        return ['id'];
    }

    public function getRawTypes()
    {
        return $this->hasOne(RawTypes::class, ['id' => 'rawTypeId']);
    }

    public function getMonthType()
    {
        return $this->hasOne(MonthType::class,['id' => 'monthTypeId']);
    }

    public function getTonnageType()
    {
        return $this->hasOne(TonnageType::class,['id' => 'tonnageTypeId']);
    }
    
    public function rules()
    {
        return [
            [['id', 'rawTypeId', 'monthTypeId', 'tonnageTypeId', 'price'], 'required'],
            [['id', 'rawTypeId', 'monthTypeId', 'tonnageTypeId'], 'integer'],
            [['price'], 'number'],
        ];
    }
}
