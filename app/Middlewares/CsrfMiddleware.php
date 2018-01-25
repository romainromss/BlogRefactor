<?php

namespace App\Middlewares;

use DI\Container;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Romss\Flashable;
use Romss\GetField;
use Romss\Tokenable;


class CsrfMiddleware
{
    use Tokenable, Flashable, GetField;

    /**
     * @param ServerRequestInterface $request
     * @param Response $response
     * @param Container $container
     * @param $next
     * @return mixed
     */
    public function __invoke(ServerRequestInterface $request, Response $response, Container $container,  $next)
    {
        $this->generateToken();

        if (in_array($request->getMethod(), ['POST' , 'PUT', 'DELETE', 'PATCH'])) {
            $checked = !empty($this->getSession('__csrf')) && !empty($this->getField('__csrf')) &&
                ($this->getSession('__csrf') === $this->getField('__csrf'));

           $this->getSession('__csrf');

            if ($checked) {
                return $next($request, $response);
            }

            $this->setFlash('danger', 'Jeton invalide, merci de rafraichir et de réessayer');
            return new Response(301, [
                'Location' => $request->getUri()->getPath()

            ]);
        }
       $this->getSession('__csrf');
        return $next($request, $response);
    }
}
