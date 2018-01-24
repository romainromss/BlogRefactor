<?php

namespace App\Actions\Auth;

use App\Services\UserServices;
use DI\Container;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Romss\Flashable;
use Romss\Render\RenderInterface;
use Romss\Tokenable;

class LoginAction
{
    use Tokenable, Flashable;

    /**
     * @var UserServices
     */
    private $userServices;

    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }

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
            $view = $container->get(RenderInterface::class)->render('Login/login');
            $response->getBody()->write($view);
            return $response;
        }

        $email = $_POST['email'] ?? null;
        $password = $_POST['pass'] ?? null;
        $remember = $_POST['remember'] ?? null;


        $user = $this->userServices->getUserByEmail($email);

        if (!empty($_SESSION['auth']) && $_SESSION['auth']['email'] === $email) {
            $this->setFlash('warning', 'Vous êtes déjà connecté !');
            return new Response(301, [
                'Location' => '/'
            ]);
        }

        if ($user && password_verify($email . '#-$' . $password, $user['password']) && $user['email_token'] === null) {
            if (!empty($remember)) {
                $token = $this->generateToken();
                setcookie('remember', $token, time() + 3600 * 24 * 7, '/', null, false, true);
            }

            unset($user['password']);
            $_SESSION['auth'] = $user;

            $this->setFlash('success', 'Vous êtes maintenant connecté !');
            return new Response(301, [
                'Location' => '/'
            ]);
        }

        $this->setFlash('danger', 'Mauvais mot de passe ou email');
        return new Response(301, [
            'Location' => '/login'
        ]);
    }
}

