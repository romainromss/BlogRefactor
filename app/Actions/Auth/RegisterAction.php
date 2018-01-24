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
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;


class RegisterAction
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
            $view = $container->get(RenderInterface::class)->render('Register/register');
            $response->getBody()->write($view);
            return $response;
        }

        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $pass_confirm = $_POST['pass_confirm'];

        $user = $this->userServices->getUserByEmail($email);


        if (filter_var($email, FILTER_VALIDATE_EMAIL) === $user['email']){
            $this->setFlash("danger", "Vous êtes déjà enregistré avec cette adresse mail");
            return new Response(301, [
                'Location' => '/register'
            ]);
        }

        $passLength = strlen($pass);
        if ($passLength < 8){
            $this->setFlash("danger", "Votre mot de passe doit contenir au minimum 8 caractères");
            return new Response(301, [
                'Location' => '/register'
            ]);
        }
        if ($pass != $pass_confirm){
            $this->setFlash("danger", "Le mot de passe de confirmation n'est pas identique à votre mot de passe");
            return new Response(301, [
                'Location' => '/'
            ]);
        }
        $tokenRegister = $this->generateToken();
        $passwordHash = password_hash($email.'#-$'.$pass, PASSWORD_BCRYPT, ['cost' => 12]);

        $userRegister = $this->userServices->registerUser([
            'password' => $passwordHash,
           'email' => $email,
            'emailToken' => $tokenRegister
        ]);

        $user = [
            'id' => $userRegister['id'],
            'email' => $email,
            'token' => $tokenRegister
        ];

        $renderHtml = $container->get(RenderInterface::class)->render('Mails/verify', [
            'user' => $user
        ]);
        $renderText = $container->get(RenderInterface::class)->render('Mails/verify', [
            'user' => $user
        ], 'text');

        // Connexion au smtp
        $transport = $container->get(Swift_SmtpTransport::class);

        // Container du mail
        $mailer = new Swift_Mailer($transport);

        // Le message à envoyer
        $message = new Swift_Message('Confirmation de votre compte');
        $message
            ->setFrom(['localhost@local.dev' => 'Admin localhost'])
            ->setTo([$email => explode('@', $email)[0]])
            ->setBody($renderHtml, 'text/html')
            ->addPart($renderText, 'text/plain');

        $result = $mailer->send($message);
        if ($result) {
            $this->setFlash('success', 'Un email vous a été envoyé pour confirmer votre compte');
        } else {
            $this->setFlash('warning', 'Une erreur est survenue lors de l\'envoie de la confirmation. Merci de contacter le SAV !');
        }

        return new Response(301, [
            'Location' => '/'
        ]);
    }
}

