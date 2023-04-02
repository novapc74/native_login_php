<?php

namespace App\Controller;

class UserController extends AbstractController
{
    public function index(): string
    {
        $title = 'Users Page';
        $users = ['1', '2', '3#####3', '4'];

        return $this->render('users/index.php', compact('title', 'users'));
    }

    public function show($id): string
    {
        $user = [
            'id' => $id,
            'firstName' => 'Ivan',
            'lastName' => 'Ivanov',
        ];
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