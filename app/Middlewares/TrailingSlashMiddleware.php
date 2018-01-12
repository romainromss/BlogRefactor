<?php

namespace  App\Middlewares;



use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;

class TrailinSlashMiddleware
{
    public function __invoke(ServerRequestInterface $request,  callable $next)
    {
        $uri = $request->getUri()->getPath();
        if (!empty($uri) && $uri[-1] ==='/' ){
            return (new Response())
                ->withStatus(301)
                ->getHeader('Location', substr($uri, 0, -1));
        }
        return $next($request);
    }
}