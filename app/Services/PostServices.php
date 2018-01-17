<?php

namespace App\Services;

use App\Repositories\PostRepositoriesInterface;

class PostServices
{
    /**
     * @var PostRepositoriesInterface $postRepositories
     */
    private $postRepositories;


    public function __construct(PostRepositoriesInterface $postRepositories)
    {
        $this->postRepositories = $postRepositories;
    }

    public function getPostWithId(int $id): array
    {
        $post = $this->postRepositories->getByPostId($id);
        return $post;
    }

    public function allpost(): array
    {
        $allPost = $this->postRepositories->all();
        return $allPost;
    }
}

