<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\PasswordHash;

class UserController extends AbstractController
{
    public function index(): string
    {
        $repository = new UserRepository();
        $users = $repository->getAll();

        if ($users === []) {
            return $this->redirectTo('/users/create');
        }

        return $this->render('users/index.php', compact('users'));
    }

    public function show($id): string
    {
        $repository = new UserRepository();
        $user = $repository->getOneBy($id);

        return $this->render('users/show.php', compact('user'));
    }

    public function create(): string
    {
        $user = new User();

        return $this->render('users/create.php', compact('user'));
    }

    public function update($data = null)
    {
        $data = $_POST['data'];
        $repository = new UserRepository();
        $user = new User();
        $user->setId($data['\'id\'']);
        $user->setFirstName($data['\'firstName\'']);
        $user->setLastName($data['\'lastName\'']);
        $user->setOldYear($data['\'oldYear\'']);
        $user->setLogin($data['\'login\'']);
        $user->setPassword(PasswordHash::hashPassword($data['\'password\'']));

        $repository->addUser($user->toArray());

        return $this->redirectTo('/users');

    }
}