<?php

namespace App\Repository;

use App\Service\DataBase;

class UserRepository
{
    private $content;
    private $connection;
    public function __construct()
    {
        $this->connection = DataBase::getInstance();
    }

    public function getOneBy($parameter)
    {
        $users = array_filter($this->connection->getDB('users'), fn($user) => $user->id == $parameter);

        return array_shift($users);
    }

    public function getAll(): ?array
    {
        return $this->connection->getDB('users');
    }

    public function addUser($user)
    {
        $users = $this->getAll();
        $users[] = $user;

        $this->connection->getDB('users', $users);
    }

}