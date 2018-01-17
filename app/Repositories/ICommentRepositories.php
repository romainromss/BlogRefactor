<?php

namespace App\Repositories;


use Romss\Database\IStatement;

interface ICommentRepositories
{
    /**
     * @return array
     */
    public function all(): array;


    /**
     * @param int $postId
     * @param bool $checkValidated
     * @return array
     */
    public function getCommentById(int $postId, bool $checkValidated): array;

    /**
     * @param $comment
     * @return array
     */
    public function insertComment($comment ): array ;

    /**
     * @param $comment
     * @return IStatement
     */
    public function updateComment($comment): IStatement;

}


