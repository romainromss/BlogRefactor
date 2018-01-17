<?php

namespace App\Services;

use App\Repositories\IUserRepositories;
use Romss\Database\IStatement;

class UserServices
{
    private $userRepositories;

    public function __construct(IUserRepositories $userRepositories)
    {
        $this->userRepositories = $userRepositories;
    }

    public function getUserByEmail($email)
    {
        $userEmail = $this->userRepositories->getUserByEmail($email);
        return $userEmail;
    }

    public function getUserById($userId)
    {
        $idUser = $this->userRepositories->getUserById($userId);
        return $idUser;
    }

    public function registerUser($user)
    {
        $user = $this->userRepositories->registerUser($user);
        return $user;
    }

    public function updateUser($user): IStatement
    {
        $user = $this->userRepositories->updateUser($user);
        return $user;
    }

    public function  allusers(){
        $users = $this->userRepositories->allusers();
        return $users;
    }
}