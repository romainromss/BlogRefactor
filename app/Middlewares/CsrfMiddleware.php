<?php

namespace App\Middlewares;

use DI\Container;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Romss\Flashable;
use Romss\Tokenable;


class CsrfMiddleware
{
    use Tokenable, Flashable;


    /**
     * @param ServerRequestInterface $request
     * @param Response $response
     * @param Container $container
     * @param $next
     * @return mixed
     */
    public function __invoke(ServerRequestInterface $request, Response $response, Container $container,  $next)
    {
        // Validate POST, PUT, DELETE, PATCH requests
        $csrf = $this->generateToken();
        if ($request->getMethod() === ['POST' , 'PUT', 'DELETE', 'PATCH']) {
            $checked = !empty($_SESSION['__csrf']) && !empty($_POST['__csrf']) &&
                ($_SESSION['__csrf'] === $_POST['__csrf']);
            $_SESSION['__csrf'] = $csrf;
            if ($checked) {
                return $next($request, $response);
            }
            return new Response(301, [
                'Location' => '/yolo'
            ]);
        }
        $_SESSION['__csrf'] = $csrf;
        return $next($request, $response);
    }
}
