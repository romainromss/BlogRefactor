<?php

namespace App\Repositories;

use Romss\Database\DatabaseInterface;
use Romss\Database\StatementInterface;

class PdoPostRepository implements PostRepositoriesInterface
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
        return $this->database->request('SELECT * FROM posts')->fetchAll();
    }

    /**
     * @param int $id
     * @return array
     */
    public function getByPostId(int $id): array
    {
        return $this->database->request('SELECT * FROM posts WHERE id = :id', [
            ':id' => $id
        ])->fetch();
    }

    /**
     * @param $post
     * @return array
     */
    public function insertPost($post): array
    {
        $this->database->request('INSERT INTO posts(title, chapo, content, author, creation_at) 
            VALUES(:title, :chapo, :content, :author, NOW())', [
            ':title' => $post['title'],
            ':chapo' => $post['chapo'],
            ':content' => $post['content'],
            ':author' => $post ['author']
        ]);

        $post['id'] = $this->database->lastId();
        return $post;
    }


    /**
     * @param $post
     * @return StatementInterface
     */
    public function updatePost($post): StatementInterface
    {
        return $this->database->request('UPDATE posts
        SET title = :title,
            chapo = :chapo,
            content = :content,
            author = :author, 
            update_at = NOW()
        WHERE id = :id', [
            ':id' => $post['id'],
            ':title' => $post['title'],
            ':chapo' => $post['chapo'],
            ':content' => $post['content'],
            ':author' => $post['author']
        ]);
    }
}


