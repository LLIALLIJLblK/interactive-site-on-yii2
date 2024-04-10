<?php

namespace frontend\controllers;

use common\models\User;
use frontend\dataRepository\DataRepository;
use frontend\models\LastLogin;
use frontend\models\LastSignup;
use frontend\models\PriceListForm;
use frontend\models\Users;
use SebastianBergmann\CodeCoverage\Report\Html\Renderer;
use yii;
use yii\bootstrap5\ActiveForm;
use yii\db\Query;
use yii\web\Controller;
use yii\web\Response;

class LastController extends Controller{

    public function actionLastCalculate(){
        
        $dataRepository = new DataRepository();
        
        $model = new PriceListForm();
        $model->load(Yii::$app->request->post());

        
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($model->validate()){
                return ['message' =>'валидация по ajax'];
            }
            else{
                return ActiveForm::validate($model);
            }    
        }

        if (!Yii::$app->user->isGuest) {
            if($model->load(Yii::$app->request->post()) && $model->validate()){
                $query = new Query();
                $query
                    ->createCommand()
                    ->insert('history',[
                        'userId' => Yii::$app->user->id,
                        'raw' => $model->rawType,
                        'month' => $model->monthType,
                        'tonnage' => $model->tonnageType,
                        'price' => $dataRepository->getPrice($model->rawType,$model->monthType,$model->tonnageType),
                    ])
                    ->execute();
            }
        }
        
        return $this->render('/site/lastview',compact('model','dataRepository'));
    }

    public function actionLastSignup(){
        
        $model = new LastSignup();

      
        if(!Yii::$app->user->isGuest){
            return $this->redirect(['/last/lastCalculate']);
        }
        
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $emailExists = User::find()->where(['email' => $model->email])->exists();
            if ($emailExists) {
                $model->addError('email', 'Пользователь с такой почтой уже существует.');
                return $this->render('/site/lastSignup', compact('model'));
            }

            $query = new Query();
            $query
                ->createCommand()
                ->insert('users',[
                'username' => $model->name,
                'email'=> $model->email,
                'password'=> Yii::$app->security->generatePasswordHash($model->password),
                ])
                ->execute();

            return $this->redirect(['/site/login']);
            
        }        
        return $this->render('/site/lastSignup',compact('model'));
        // return $this->render('/site/lastview',compact('model'));
    }

    public function actionLastHistory(){
        $userId = Yii::$app->user->id;
        $query = new Query();
        $historyData = $query
                       ->select('*')
                       ->from('history')
                       ->where(['userId' => $userId])
                       ->all();

        if (Yii::$app->user->isGuest) {
            return $this->redirect('../site/index');
        }

        return $this->render('/site/lastHistory',compact('historyData'));
    }



}


