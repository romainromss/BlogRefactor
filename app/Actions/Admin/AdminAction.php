<?php

namespace App\Actions\Admin;

use DI\Container;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Romss\ActionsParams;
use Romss\Render\RenderInterface;

class AdminAction extends ActionsParams
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
        if (!isset($_SESSION['auth']) || $_SESSION['auth']['rank'] != 3){
            $this->setFlash("danger", "Vous devez être admin pour entrer");
            return new Response(301, [
                'Location' => '/'
            ]);

        } elseif ($request->getMethod() === 'GET') {
            $view = $container->get(RenderInterface::class)->render('Admin/admin');
            $response->getBody()->write($view);
        }
        return $response;
    }
}
