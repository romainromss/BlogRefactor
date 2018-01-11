<?php

namespace App\Services;

use App\Repositories\ICommentRepositories;

class CommentServices
{
    private $commentRepositories;

    public function __construct(ICommentRepositories $commentRepositories)
    {
        $this->commentRepositories = $commentRepositories;
    }

    /**
     * @param int $postId
     * @return array
     */
    public function getCommentId(int $postId):array
    {
        $comment = $this->commentRepositories->getCommentById($postId);
        return $comment;
    }

    public function allComments(): array
    {
       $allComments =$this->commentRepositories->all();
       return $allComments;
    }
}
