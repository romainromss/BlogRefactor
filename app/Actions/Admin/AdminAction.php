<?php

namespace App\Actions\Admin;

use DI\Container;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Romss\ActionsParams;
use Romss\Render\RenderInterface;

class AdminAction
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
        if ($request->getMethod() === 'GET') {
            $view = $container->get(RenderInterface::class)->render('Admin/home');
            $response->getBody()->write($view);
        }
        return $response;
    }
}

