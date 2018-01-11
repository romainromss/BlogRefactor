<?php

namespace  App\Actions\Posts;

use App\Services\PostServices;
use DI\Container;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Romss\Render\IRender;

class PostAction
{
    /**
     * @var PostServices $postServices
     */
    private $postServices;

    public function __construct(PostServices $postServices)
    {
        $this->postServices = $postServices;
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
        //AJOUTER MESSAGE FLASH VARIABLE PAGE POUR TWIG

        $post = $this->postServices->getPostWithId($request->getAttribute('post', 0));
        $view = $container->get(IRender::class)->render('Article/postdetails', ['post' => $post]);
        $response->getBody()->write($view);
        return $response;
    }
}
