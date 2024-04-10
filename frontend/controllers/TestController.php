<?php

namespace frontend\controllers;

use frontend\models\Month1;
use frontend\models\MonthType;
use frontend\models\Price_list1;
use frontend\models\PriceList;
use frontend\models\RawTypes;
use frontend\models\Tonnage1;
use frontend\models\TonnageType;
use yii\web\Controller;
use Yii;


class TestController extends Controller
{
    public function actionGet1($raw_types = NULL, $month = NULL, $tonnage = NULL)
    {
        $prices = Yii::$app->params['prices'];

        $result = $prices[$raw_types][$month][$tonnage];

        $response = [
            "price" => $result,
            "price_list" => $prices[$raw_types],
        ];

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $response;
    }

    public function actionView()
    {
        $modelRaw = new RawTypes();
        $modelRaw = RawTypes::find()->all();

        $modelMonth = new MonthType();
        $modelMonth = MonthType::find()->all();

        $modelTonnage = new TonnageType();
        $modelTonnage = TonnageType::find()->all();

        $modelPrice = new PriceList();
        $modelPrice = PriceList::find()->with(['rawTypes','monthType','tonnageType'])->all();

        return $this->render('/view',  compact('modelRaw', 'modelMonth', 'modelTonnage', 'modelPrice'));
    }
}
