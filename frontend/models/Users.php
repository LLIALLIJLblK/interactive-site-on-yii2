<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class Users extends ActiveRecord {

    public static function tableName()
    {
        return 'users';
    }
    
    public static function primaryKey()
    {
        return['id'];
    }

    public function rules()
    {
        return[
            [['id','username', 'email', 'password'], 'required'],
            [['id'],'integer'],
            [['email'], 'email'],
            [['password'], 'match', 'pattern' => '/^(?=.*\d)[A-Za-z\d]{6,}$/i'],
        ];
    }
   
}
