<?php

namespace App\Actions\Auth;

use DI\Container;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Romss\ActionsParams;

class LogoutAction extends ActionsParams
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, Container $container)
    {
       unset($_SESSION['auth']);
       setcookie('remeber', '', -1, '/', null, false, true);
       $this->setFlash('success', 'Vous êtes bien déconnecté');
       return new Response(301, [
           'Location' => '/'
       ]);
    }
}

