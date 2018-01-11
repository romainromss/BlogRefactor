<?php

return [
    'home.index' => [
        'methods' => ['GET'],
        'path' => '/',
        'action' => App\Actions\Home\IndexAction::class
    ],
    'posts.index' => [
        'methods' => ['GET'],
        'path' => '/posts',
        'action' => App\Actions\Posts\AllPostAction::class
    ],
    'posts.details' => [
        'methods' => ['GET'],
        'path' => '/posts/{post:[0-9]+}',
        'action' => App\Actions\Posts\PostAction::class,
        'middlewares' => [
            \App\Middlewares\CheckPostIdMiddleware::class
        ]
    ],
    'login.index' => [
        'methods' => ['GET'],['POST'],
        'path' => '/login',
        'action' => App\Actions\Login\LoginAction::class

    ]
];
