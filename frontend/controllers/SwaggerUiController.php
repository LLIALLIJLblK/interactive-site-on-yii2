<?php

namespace frontend\controllers; //было вместо frontend app

use Yii;
use yii\web\Controller;
use yii\web\Response;


class SwaggerUiController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
