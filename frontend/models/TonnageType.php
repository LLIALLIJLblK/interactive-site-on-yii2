<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class TonnageType extends ActiveRecord{


    public static function tableName()
    {
        return 'tonnageType';
    }
    
    public static function primaryKey()
    {
        return['id'];
    }

    public function rules()
    {
        return[
            [['id','tonnage','required']],
            [['id'],'integer'],
            [['tonnage'], 'integer'],
        ];
    }
}
