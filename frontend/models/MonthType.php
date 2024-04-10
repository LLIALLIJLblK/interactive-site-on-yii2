<?php


namespace frontend\models;

use yii\db\ActiveRecord;

class MonthType extends ActiveRecord{

    public static function tableName()
    {
        return 'monthType';
    }

    public static function primaryKey()
    {
        return ['id'];
    }
    // public function getPrices(){
    //     return $this->hasMany(Price_list1::class,['month1_id','id']);
    // }
    public function rules()
    {
        return[
            [['id','month'],'required'],
            [['id'] , 'integer'],
            [['month'],'string', 'max' =>30],
        ];
    }

}
