<?php

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => \common\models\User::class,
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
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
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],

    // Proteção global do back-office: exige a permissão 'acederBackOffice'
    'as beforeRequest' => [
        'class' => \yii\filters\AccessControl::class,
        'rules' => [
            [
                // Permite o acesso à página de login e de erro para visitantes não autenticados
                'actions' => ['login', 'error', 'logout'],
                'allow' => true,
            ],
            [
                // Bloqueia qualquer outra rota a quem não tiver a permissão 'acederBackOffice'
                'allow' => true,
                'roles' => ['acederBackOffice'],
            ],
        ],
    ],

    'params' => $params,
];
