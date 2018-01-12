<?php

use DI\ContainerBuilder;
use Romss\Application;
use Romss\Dispatcher;

session_start();

require __DIR__.'/../vendor/autoload.php';


$containerBuilder = new ContainerBuilder();
$container = $containerBuilder->build();
$middlewares = new Dispatcher($container, $middlewares = []);



try {
    $app = new Application();
    $app->init();
    $app->run();
    $middlewares->pipe(\App\Middlewares\TrailingSlashMiddleware::class);
    $middlewares->pipe(\App\Middlewares\CheckPostIdMiddleware::class);

} catch (Exception $exception) {
    var_dump($exception->getMessage());
}





