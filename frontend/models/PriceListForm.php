<?php


namespace frontend\models;

use yii\base\Model;

class PriceListForm extends Model {

    public $monthType;
    public $tonnageType;
    public $rawType;
    public $price;


    public function rules(){
        return[
            [['monthType'], 'required', 'message' => 'Выберите месяц!'],
            [['tonnageType'], 'required', 'message' => 'Выберите тоннаж!'],
            [['rawType'], 'required', 'message' => 'Выберите сырьё'],
        ];
    }
}