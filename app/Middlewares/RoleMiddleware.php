<?php

namespace  App\Middlewares;

use DI\Container;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Romss\Flashable;


class RoleMiddleware
{
    use Flashable;

    public function __invoke(ServerRequestInterface $request, Response $response, Container $container, $next)
    {
         if (!isset($_SESSION['auth']) || $_SESSION['auth']['rank'] != 3) {
             $this->setFlash("danger", "Vous devez être admin pour entrer");
             return new Response(301, [
                 'Location' => '/'
             ]);
         } else {
             return $next($request, $response);
         }
    }
}