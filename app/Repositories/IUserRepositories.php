<?php
namespace App\Repositories;


use Romss\Database\IStatement;

interface IUserRepositories
{
    /**

     * @param $user
     * @return array
     */
    public function registerUser($user): array;

    /**
     * @param $email
     * @return string
     */
    public function getUserByEmail($email);

    /**
     * @param $userId
     * @return array|bool
     */
    public function getUserById($userId);

    /**
     * @param $user
     * @return IStatement
     */
    public function updateUser($user): IStatement;

    public function allusers();

}
