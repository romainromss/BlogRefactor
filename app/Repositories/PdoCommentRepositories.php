<?php

namespace App\Repositories;

use Romss\Database\IDatabase;

class PdoCommentRepositories implements ICommentRepositories
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
     * @param int $id
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->database->request('SELECT * FROM comments WHERE id = :id', [
            ':id' => $id
        ])->fetch();
    }

    /**
     * @param int $postId
     * @return array
     */
    public function getByPostId(int $postId): array
    {
        return $this->database->request('SELECT * FROM comments WHERE post_id = :postId', [
            ':postId' => $postId
        ])->fetchAll();
    }

    /**
     * @param array $user
     * @return int
     */
    public function insert(array $user): int
    {
        // TODO: Implement insert() method.
    }

    /**
     * @param array $user
     */
    public function update(array $user): void
    {
        // TODO: Implement update() method.
    }
}
