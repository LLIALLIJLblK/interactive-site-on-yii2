<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'name' => 'EFKO calculate',
    'language' => 'ru',

    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'doc/mass' => 'doc/mass',
                'test/view' => 'test/view',

                'api/v1/types' =>'api/types',
                'api/v1/months' =>'api/months',
                'api/v1/tonnages'=> 'api/tonnages',
                'api/v1/calculate'=> 'api/calculate',
                'api/v1/get-spec'=>'api/get-spec',

                'last/lastCalculate' => 'last/last-calculate',
                'last/lastSignup' => 'last/last-signup',
                'last/lastLogin' => 'last/last-login',
                'last/lastHistory'=>'last/last-history'
            ],
        ],
        
    ], 
    'params' => $params,
];
