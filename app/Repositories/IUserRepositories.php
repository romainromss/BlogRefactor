<?php
namespace App\Repositories;


use Romss\Database\IStatement;

interface IUserRepositories
{
    /**

     * @param $user
     * @return array
     */
    public function registerUser($user): array ;

    /**
     * @param $email
     * @return string
     */
    public function getUserByEmail($email): string ;

    /**
     * @param $userId
     * @return int
     */
    public function getUserById($userId): int;

    /**
     * @param $user
     * @return IStatement
     */
    public function updateUser($user): IStatement;

}
