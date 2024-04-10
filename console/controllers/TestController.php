<?php

namespace console\controllers;
use yii\console\Controller;

class TestController extends Controller{

    public function actionTask1(){
        $basePath = __DIR__ . '/../../frontend/runtime/queue.job';
        $counter = 0;
        
        var_dump($basePath);
        while(true){
            $counter++;
            echo 'Текущая итерация: '.$counter . PHP_EOL;

            if (file_exists($basePath)){
                $data = file_get_contents($basePath);
                echo  $data;
                unlink($basePath);
            }
            else{
                echo"файла больше нет" .PHP_EOL;
            }
            sleep(2);
        }
        die;
    }
}