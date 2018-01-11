<?php

//use Romss\Database\IDatabase;


use Psr\Http\Message\ServerRequestInterface;

require __DIR__.'/../vendor/autoload.php';

$containerBuilder = new \DI\ContainerBuilder();
$containerBuilder->useAutowiring(true);
$containerBuilder->addDefinitions(__DIR__.'/../configs/dic/database.php');
$containerBuilder->addDefinitions(__DIR__.'/../configs/dic/repositories.php');
$container = $containerBuilder->build();

$request = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();
$response = new \GuzzleHttp\Psr7\Response();

$router = new \Zend\Expressive\Router\FastRouteRouter();
$router->addRoute(new \Zend\Expressive\Router\Route('/post/{post:[0-9]+}', function (ServerRequestInterface $request, $response, $container) {
    echo 'Salut pour id : '.$request->getAttribute('post');
}, ['GET'], 'article.all'));

$route = $router->match($request);

if ($route->isSuccess()) {
    foreach ($route->getMatchedParams() as $name => $value) {
        $request = $request->withAttribute($name, $value);
    }
    call_user_func_array($route->getMatchedMiddleware(), [
        $request,
        $response,
        $container
    ]);
}

$postAction = new \App\Actions\Posts\PostAction($container->get(\App\Services\PostServices::class));
$postAction($request, $response, $container);

$allPostAction = new \App\Actions\Posts\AllPostAction($container->get(\App\Services\PostServices::class));
$allPostAction($request, $response, $container);

$commentAction = new \App\Actions\Posts\CommentAction($container->get(\App\Services\CommentServices::class));
$commentAction($request, $response, $container);

$allCommentAction = new \App\Actions\Posts\AllCommentAction($container->get(\App\Services\CommentServices::class));
$allCommentAction($request, $response, $container);



try {
    $db = $container->get(IDatabase::class);
    $request = $db->request('SELECT * FROM users');
    //var_dump($request->fetchAll());
} catch (\DI\DependencyException $e) {
} catch (\DI\NotFoundException $e) {
}


