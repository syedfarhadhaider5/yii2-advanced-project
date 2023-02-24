<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);


 $config = [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'sign-in/login',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
        'enableCookieValidation' => false,
        'enableCsrfValidation' => false,
    ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'loginUrl' => ['sign-in/login'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
            'errorAction' => 'sign-in/error',
        ],
       'urlManager' => [
           'enablePrettyUrl' => true,
           'showScriptName' => false,
           'rules' => [
           ],
       ],
    ],
    'as globalAccess' => [
        'class' => '\yii\filters\AccessControl',
        'rules' => [
            [
                'controllers' => ['sign-in','error'],
                'actions' => ['login'],
                'allow' => true,
            ],
            [
                'controllers' => ['sign-in'],
                'actions' => ['index','logout'],
                'allow' => true,
                'roles' => ['@'],
            ],
            [
                'allow' => true,
                'roles' => ['@'],
            ],
            [
                'controllers' => ['gii/*'],
                'allow' => true,
                'roles' => ['admin'],
            ],
            [
                'controllers' => ['user'],
                'actions' => ['create'],
                'allow' => true,
                'roles' => ['@'],
            ],
        ]
    ],
    'params' => $params,
];


return $config;