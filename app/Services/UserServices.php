<?php

namespace App\Services;

use App\Repositories\IUserRepositories;

class UserServices
{
    private $userRepositories;

    public function __construct(IUserRepositories $userRepositories)
    {
        $this->userRepositories = $userRepositories;
    }

    public function getUserByEmail($email):string
    {
        $userEmail = $this->userRepositories->getUserByEmail($email);
        return $userEmail;
    }

    public function getUserById($userId): int
    {
        $idUser = $this->userRepositories->getUserByEmail($userId);
        return $idUser;
    }
}