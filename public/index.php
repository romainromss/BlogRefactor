<?php

use Romss\Application;

session_start();

require __DIR__.'/../vendor/autoload.php';

try {
    $app = new Application();
    $app->init();
    $app->run();

} catch (Exception $exception) {
    var_dump($exception->getMessage());
}
var_dump($_SESSION);


