<?php

namespace  App\Actions\Blog;

use App\Services\PostServices;
use DI\Container;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class IndexAction
{
    /**
     * @var PostServices $postServices
     */
    private $postServices;

    public function __construct(PostServices $postServices)
    {
        $this->postServices = $postServices;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, Container $container)
    {
        $result = $this->postServices->getPostWithComments(1);
        $post = $result['post'];

        $post['title'] = 'New title';
        $post['id'] = $this->postServices->save($post);

        $post['title'] = 'New title 2';
        $post['id'] = $this->postServices->save($post);
    }
}
