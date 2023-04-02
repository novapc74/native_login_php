<?php

namespace App\Controller;

class UndefinedPageController extends AbstractController
{
    public function index(): string
    {
        return $this->render('page_404/404.html', [
            'title' => '404'
        ]);
    }
}