<?php
namespace App\Repositories;


use Romss\Database\StatementInterface;

interface UserRepositoriesInterface
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
     * @return StatementInterface
     */
    public function updateUser($user): StatementInterface;

    public function allusers();
}
