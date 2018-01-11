<?php
namespace App\Actions\Posts;

use App\Services\PostServices;
use DI\Container;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Romss\Render\IRender;

class AllPostAction
{
    private $postServices;


    public function  __construct(PostServices $postServices)
    {
       $this->postServices = $postServices;
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param Container $container
     * @return int|ResponseInterface
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, Container $container)
    {
        //AJOUTER MESSAGE FLASH VARIABLE PAGE POUR TWIG

        $posts = $this->postServices->allpost();
        $view = $container->get(IRender::class)->render('Article/post', ['posts' => $posts]);
        $response->getBody()->write($view);
        return $response;
    }
}
