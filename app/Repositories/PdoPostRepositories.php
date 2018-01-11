<?php

namespace App\Repositories;

use Romss\Database\IDatabase;

class PdoPostRepositories implements IPostRepositories
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
        return $this->database->request('SELECT * FROM posts')->fetchAll();
    }

    /**
     * @param int $id
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->database->request('SELECT * FROM posts WHERE id = :id', [
            ':id' => $id
        ])->fetch();
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
