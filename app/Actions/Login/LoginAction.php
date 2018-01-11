<?php

namespace App\Actions\Login;

use DI\Container;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Romss\Render\IRender;

class LoginAction
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param Container $container
     * @return ResponseInterface
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public  function __invoke(ServerRequestInterface $request, ResponseInterface $response, Container $container)
    {
        //AJOUTER PARTIE SECURITE LOGIN
        //LOGOUT
        $view = $container->get(IRender::class)->render('Login/login', []);
        $response->getBody()->write($view);

        return $response;
    }
}