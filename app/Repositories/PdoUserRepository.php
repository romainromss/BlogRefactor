<?php
namespace App\Repositories;

use Romss\Database\IDatabase;
use Romss\Database\IStatement;

class PdoUserRepository implements IUserRepositories
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

     * @param $user
     * @return array
     */
    public function registerUser($user): array
    {
        $this->database->request('
            INSERT INTO users (password, email, email_token, register_at, connection_at, rank) 
            VALUES (:password, :email, :emailToken, NOW(), NULL, 1)',[
            ':password' => $user ['password'],
            ':email' => $user ['email'],
            ':emailToken' => $user ['emailToken']
            ]);
        $user['id'] = $this->database->lastId();
        return $user;
    }


    /**
     * @param $email
     * @return array|string
     */
    public function getUserByEmail($email): string
    {
        return $this->database->request(
            'SELECT id, password, email, email_token, register_at, connection_at, rank FROM users
        WHERE email = :email',[
            ':email' => $email
        ])->fetch();
    }

    /**
     * @param $userId
     * @return array|int
     */
    public function getUserById($userId): int
    {
        return $this->database->request(
            'SELECT id, password, email, email_token, register_at, connection_at, rank FROM users
        WHERE id = :userId
        LIMIT 0, 1' ,[
            ':userId' => $userId
        ])->fetch();

    }

    /**
     * @param $user
     * @return IStatement
     */
    public function updateUser($user): IStatement
    {
        return $this->database->request(
            'UPDATE users
        SET email = :email,
            email_token = :email_token,
            connection_at = :connection_at,
            rank = :rank
        WHERE id = :userId', [
            ':email' => $user['email'],
            ':email_token' => $user['email_token'],
            ':connection_at' => $user['connection_at'],
            ':rank' => $user['rank'],
            ':userId' => $user['id']
        ]);
    }
 }