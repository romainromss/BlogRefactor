<?php

use Romss\Application;

require __DIR__.'/../vendor/autoload.php';


try {
    $app = new Application();
    $app->init();
    $app->run();
} catch (Exception $exception) {
    var_dump($exception->getMessage());
}


