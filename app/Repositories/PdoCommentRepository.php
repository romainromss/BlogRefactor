<?php

namespace App\Repositories;

use Romss\Database\DatabaseInterface;
use Romss\Database\StatementInterface;

class PdoCommentRepository implements CommentRepositoriesInterface
{

    /**
     * @var DatabaseInterface
     */
    private $database;

    public function __construct(DatabaseInterface $database)
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
     * @param bool $checkValidated
     * @return array
     */
    public function getCommentById(int $postId, bool $checkValidated): array
    {
        return $this->database->request('
            SELECT * FROM comments WHERE post_id = :postId AND validated = :check', [

            ':postId' => $postId,
            ':check' => intval($checkValidated)
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
     * @return StatementInterface
     */
    public function updateComment($comment): StatementInterface
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

