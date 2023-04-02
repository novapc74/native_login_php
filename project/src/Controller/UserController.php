<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\PasswordHash;

class UserController extends AbstractController
{
    public function index(): string
    {
        $users = [];
        $repository = new UserRepository();

        $user = new User();

        $user->setId(1);
        $user->setFirstName('Ivan');
        $user->setLastName('Ivanov');
        $user->setOldYear('20');
        $user->setPassword(PasswordHash::hasPassword('secret'));
        $user->setLogin('new login');

        $repository->addUser($user->toArray());

        $users[] = $user;
        $title = 'Ура!!!';

        return $this->render('users/index.php', compact('users', 'title'));
    }

    public function show($id): string
    {
        $repository = new UserRepository();
        $user = $repository->getOneBy($id);

        return $this->render('users/show.php', compact('user'));
    }

    public function create($id): string
    {
        return $this->render('base.html', [
            'title' => $id,
            'users' => ["user id: $id"]
        ]);
    }
}