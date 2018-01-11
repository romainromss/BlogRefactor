<?php

namespace  App\Actions\Posts;

use App\Services\CommentServices;
use DI\Container;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CommentAction
{
    /**
     * @var
     */
    private $commentServices;

    public function __construct(commentServices $commentServices)
    {
        $this->commentServices = $commentServices;
    }


    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, Container $container)
    {
        $result = $this->commentServices->getCommentId(1);//a modifier une fois les routes cree.
        return $result;
    }
}
