<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => \yii\debug\Module::class,
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => \yii\gii\Module::class,
    ];
}
if(!YII_ENV_DEV){
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1'], // allow access only from localhost
        'generators' => [ // configure the available generators
            'crud' => [
                'class' => 'yii\gii\generators\crud\Generator',
                'templates' => [
                    'myCrud' => '@app/gii/templates/crud/default',
                ]
            ]
        ],
    ];
}
return $config;
