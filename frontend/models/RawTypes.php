<?php


namespace frontend\models;


use yii\db\ActiveRecord;

class RawTypes extends ActiveRecord{

    public static function tableName()
    {  
        return 'rawTypes';
        
    }
    
    public static function primaryKey()
    {
        return ['id'];
    }

    public function rules()
    {
        return [
            [['id', 'rawtype'], 'required'],
            [['id'], 'integer'],
            [['rawtype'], 'string', 'max' => 30],
        ];
    }
}

