<?php

return [
    'home.index' => [
        'methods' => ['GET'],
        'path' => '/',
        'action' => App\Actions\Home\IndexAction::class,
        'middlewares' => []
    ],
    'posts.index' => [
        'methods' => ['GET'],
        'path' => '/posts',
        'action' => App\Actions\Posts\AllPostAction::class,
        'middlewares' => []
    ],
    'posts.details' => [
        'methods' => ['GET'],
        'path' => '/posts/{post:[0-9]+}',
        'action' => App\Actions\Posts\PostAction::class,
        'middlewares' => []
    ],
    'login.index' => [
        'methods' => ['GET'],['POST'],
        'path' => '/login',
        'action' => App\Actions\Login\LoginAction::class,
        'middlewares' => []

    ],
    'register.index' => [
        'methods' => ['GET'],['POST'],
        'path' => '/register',
        'action' => App\Actions\Register\RegisterAction::class,
        'middlewares' => []

    ],
    'contact.index' => [
        'methods' => ['GET'],['POST'],
        'path' => '/contact',
        'action' => App\Actions\Contact\ContactAction::class,
        'middlewares' => []
    ]
];
