<?php

namespace App\Repositories;

use Romss\Database\IStatement;

interface IPostRepositories
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
     * @return IStatement
     */
    public function updatePost($post): IStatement;

    /**
     * @return array
     */
    public function countPost(): array;
}
