<?php

namespace App\Actions\Contact;

use DI\Container;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Romss\ActionsParams;
use Romss\Render\IRender;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class ContactAction extends ActionsParams
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
        if ($request->getMethod() === 'GET') {
            $view = $container->get(IRender::class)->render('Contact/contact');
            $response->getBody()->write($view);

            return $response;
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
        $content = $_POST['content'];

        if (empty(filter_var($email, FILTER_VALIDATE_EMAIL))){
            $this->setFlash("danger", "Votre adresse est vide");
            return new Response(301, [
                'Location' => '/contact'
            ]);
        }

        $nameLength = strlen($name);
        if (empty($name) || $nameLength < 4 ) {
            $this->setFlash("danger", "Votre nom doit contenir au moins 4 caractères ou ne doit pas être vide");
            return new Response(301, [
                'Location' => '/contact'
            ]);
        }

        $contentLength = strlen($content);
        if ($contentLength < 50) {
            $this->setFlash("danger", "Votre message doit contenir au minimum 50 caractères");
            return new Response(301, [
                'Location' => '/contact'
            ]);
        }

        // Connexion au smtp
        $transport = $container->get(Swift_SmtpTransport::class);

        // Container du mail
        $mailer = new Swift_Mailer($transport);

        // Le message à envoyer
        $message = new Swift_Message($name);
        $message
            ->setFrom(['localhost@test' => 'Admin'])
            ->setTo([$email => $name])
            ->setBody($content);

        $result = $mailer->send($message);
        if ($result) {
            $this->setFlash('success', 'Merci pour votre message nous vous répondrons dans les meilleures délais');
        } else {
            $this->setFlash('danger', 'Votre email n\'a pu être envoyé');
        }
        return new Response(301,[
            'Location' => '/'
        ]);
    }

}
