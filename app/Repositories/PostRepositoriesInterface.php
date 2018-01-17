<?php

namespace App\Repositories;

use Romss\Database\StatementInterface;

interface PostRepositoriesInterface
{
    /**
     * @return array
     */
    public function all(): array;

    /**
     * @param int $id
     * @return array
     */
    public function getByPostId(int $id): array;

    /**
     * @param $post
     * @return array
     */
    public function insertPost($post): array;

    /**
     * @param $post
     * @return StatementInterface
     */
    public function updatePost($post): StatementInterface;
}

