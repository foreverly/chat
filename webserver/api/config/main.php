<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\modules\v1\controllers',
    'modules' => [
        'v1' => [
            'class' => 'api\modules\v1\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-api',
        ],
        // 'user' => [
        //     'identityClass' => 'common\models\User',
        //     'enableAutoLogin' => true,
        //     'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],
        // ],
        'user' => [ 
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'enableSession' => false,
        ],
        'session' => [
            // this is the name of the session cookie used for login on the api
            'name' => 'webserver-api',
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function ($event) {

                $response = $event->sender;
                $code = $response->getStatusCode();

                if ($response->format == 'html') {
                    # code...
                }else{
                    if ($response->data !== null && $code != 200 && $msg = $response->data['message']) {
                        $response->data = [
                            'code' => $code,
                            'msg' => $msg,
                        ];
                        $response->statusCode = 200;
                    }

                    $response->format = yii\web\Response::FORMAT_JSON;
                } 
            },
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        // 'errorHandler' => [
        //     'errorAction' => 'site/error',
        // ],
        // 路由美化 
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' =>true,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['v1/eth'],
                    'extraPatterns' => [
                        'POST make' => 'make',
                        'POST grab-node' => 'grab-node',
                    ]
                ],
            ],

        ],
    ],
    'params' => $params,
];
