<?php

namespace  App\Actions\Home;

use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Romss\Render\IRender;

class IndexAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, Container $container)
    {
        try {
            $view = $container->get(IRender::class)->render('Home/home', []);
            $response->getBody()->write($view);
        } catch (DependencyException $e) {
        } catch (NotFoundException $e) {
        }

        return $response;
    }
}
