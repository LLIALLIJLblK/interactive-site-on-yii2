<?php


namespace frontend\models;

use yii\base\Model;

class CalculationForm extends Model
    {
        public $raw_types;     
        public $tonnage; 
        public $month;
        
        public function rules()
        {
            
            return [
                [['raw_types'], 'required', 'message' => 'Please enter a raw'],
                [['tonnage'], 'required', 'message' => 'Please enter a tonnage'],
                [['month'], 'required', 'message' => 'Please enter a month'],
            ];
        }

    }


?>