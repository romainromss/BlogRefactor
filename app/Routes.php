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
        'methods' => ['GET', 'POST'],
        'path' => '/login',
        'action' => App\Actions\Auth\LoginAction::class,
        'middlewares' => []
    ],
    'contact.index' => [
        'methods' => ['GET', 'POST'],
        'path' => '/contact',
        'action' => App\Actions\Contact\ContactAction::class,
        'middlewares' => []
    ],
    'register.index' => [
        'methods' => ['GET','POST'],
        'path' => '/register',
        'action' => App\Actions\Auth\RegisterAction::class,
        'middlewares' => []
    ],
    'logout.index' => [
        'methods' => ['GET'],
        'path' => '/logout',
        'action' => App\Actions\Auth\LogoutAction::class,
        'middlewares' => []
    ],
    'verifyToken' =>[
        'methods' =>['GET'],
        'path' => '/verify/{id:[0-9]+}-{token:[a-z\-0-9]+}',
        'action' => App\Actions\Auth\VerifyMailAction::class,
    ],
    'admin.index' => [
        'methods' => ['GET', 'POST'],
        'path' => '/panel',
        'action' => App\Actions\Admin\AdminAction::class,
        'middlewares' => []
    ]
];
