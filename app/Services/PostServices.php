<?php

namespace App\Services;

use App\Repositories\IPostRepositories;

class PostServices
{
    /**
     * @var IPostRepositories $postRepositories
     */
    private $postRepositories;


    public function __construct(IPostRepositories $postRepositories)
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
