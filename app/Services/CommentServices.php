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
     * @param bool $checkValidated
     * @return array
     */
    public function getCommentId(int $postId, bool $checkValidated):array
    {
        $comment = $this->commentRepositories->getCommentById($postId, $checkValidated);
        return $comment;
    }

    public function allComments(): array
    {
       $allComments =$this->commentRepositories->all();
       return $allComments;
    }
}
