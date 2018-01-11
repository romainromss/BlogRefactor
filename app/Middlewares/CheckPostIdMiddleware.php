<?php

namespace  App\Middlewares;

use DI\Container;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
class CheckPostIdMiddleware
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, Container $container, $next)
    {
        $response = $next($request, $response);
        return $response;
    }
}
