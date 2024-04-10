<?php


namespace frontend\controllers;

use frontend\models\MonthType;
use frontend\models\PriceList;
use frontend\models\RawTypes;
use frontend\models\TonnageType;
use Yii;

use yii\web\Controller;
use yii\web\Response;

class ApiController extends Controller
{

     /**
     * @return string
     */
    public function actionGetSpec()
    {
        Yii::$app->response->format = Response::FORMAT_RAW;
        Yii::$app->response->headers->set('Content-Type', 'application/x-yaml');

        ob_start();
        include_once Yii::getAlias('@frontend/swagger/spec.yml');

        return ob_get_clean();
    }

    public function actionMonths()
    {
        $modelMonth = new MonthType();
        $modelMonth = MonthType::find()->all();  

        $month = array_column($modelMonth, 'month','id');

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $month; 
    }

    public function actionTonnages()
    {
        $modelTonnage = new TonnageType();
        $modelTonnage = TonnageType::find()->all();

        $tonnage = array_column($modelTonnage, 'tonnage','id');

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $tonnage;
        
    }

    public function actionTypes()
    {       
        $modelRaw = new RawTypes();
        $modelRaw = RawTypes::find()->all();

        $type = array_column($modelRaw,'rawtype','id');
        
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $type;
    }

    public function actionCalculate($month,$tonnage,$type){
        $month = Yii::$app->request->get('month');
        $tonnage = Yii::$app->request->get('tonnage');
        $type = Yii::$app->request->get('type');

        $modelPrice = new PriceList();
        
        $modelPrice = PriceList::find()
        ->joinWith(['monthType', 'tonnageType', 'rawTypes'])
        ->where([
            'monthType.month' => $month,
            'tonnageType.tonnage' => $tonnage,
            'rawTypes.rawtype' => $type,
        ])
        ->one();

        $modelPriceType = PriceList::find()
        ->joinWith(['monthType', 'tonnageType', 'rawTypes'])
        ->where([
            'rawTypes.rawtype' => $type,
        ])
        ->all();

        $priceList = [];
        foreach ($modelPriceType as $col){
            $type = $col->rawTypes->rawtype;
            $month = $col->monthType->month;
            $tonnage = $col->tonnageType->tonnage;
            $price = $col->price;
            $priceList[$type][$month][$tonnage] = $price;
        }

        $result = $modelPrice->price;
        $prices = $priceList;

        $response = [
            'price' => $result,
            'price_list' =>$prices
        ];

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $response;
    }   
}
