<?php


namespace frontend\controllers;

use yii\web\Controller;


class SpaController extends Controller
{
    public function actionIndex()
    {
        return require_once \Yii::getAlias('@frontend/web/index.html');
    }
}
