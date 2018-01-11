<?php

namespace  App\Actions\Posts;

use App\Services\CommentServices;
use DI\Container;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AllCommentAction
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
        $result = $this->commentServices->allComments();
        return $result;
    }
}
