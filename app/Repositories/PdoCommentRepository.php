<?php

namespace App\Repositories;

use Romss\Database\IDatabase;
use Romss\Database\IStatement;

class PdoCommentRepository implements ICommentRepositories
{

    /**
     * @var IDatabase
     */
    private $database;

    public function __construct(IDatabase $database)
    {
        $this->database = $database;
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->database->request('SELECT * FROM comments')->fetchAll();
    }


    /**
     * @param int $postId
     * @return array
     */
    public function getCommentById(int $postId): array
    {
        return $this->database->request('SELECT * FROM comments WHERE post_id = :postId',
            [
            ':postId' => $postId
        ])->fetchAll();
    }

    /**
     * @param $comment
     * @return array
     */
    public function insertComment($comment): array
    {
        $this->database->request('INSERT INTO comments(author, comment, comment_at) 
            VALUES(:author, :comment, NOW())', [
            ':author' => $comment['author'],
            ':comment' => $comment['comment'],
        ]);

        $comment['post_id'] = $this->database->lastId();
        return $comment;
    }

    /**
     * @param $comment
     * @return IStatement
     */
    public function updateComment($comment): IStatement
    {
        return $this->database->request('UPDATE comments
        SET post_id = :post_id,
            author = :author,
            comment = :comment,
            comment_at = NOW()
        WHERE id = :id', [
            ':post_id' => $comment['post_id'],
            ':author' => $comment['author'],
            ':comment' => $comment['comment'],
        ]);
    }
}
