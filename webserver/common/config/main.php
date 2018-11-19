<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => '127.0.0.1',
            'port' => 6379,
            'database' => 0,
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'weixin' => [
                    'class' => '\common\authclient\Weixin',
                    'clientId' => 'wxd657b859eb8574e5',
                    'clientSecret' => '764ed04aeb258369263772eb8cdd15b4',
                ],
            ],
        ]
    ],
];
