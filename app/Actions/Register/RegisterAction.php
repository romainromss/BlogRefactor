<?php

namespace App\Actions\Register;


use DI\Container;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Romss\Render\IRender;


class RegisterAction
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param Container $container
     * @return ResponseInterface
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, Container $container)
    {
       $view = $container->get(IRender::class)->render('Register/register');
       $response->getBody()->write($view);

       return $response;
    }
}