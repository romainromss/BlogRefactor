<?php

namespace App\Actions\Admin;

use App\Services\UserServices;
use DI\Container;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Romss\ActionsParams;
use Romss\Render\IRender;

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
            $view = $container->get(IRender::class)->render('Admin/admin');
            $response->getBody()->write($view);
        }
        return $response;
    }
}