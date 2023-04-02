<?php

namespace App\Controller;

class MainPageController extends AbstractController
{
    public function index(): ?string
    {
        return $this->render('main_page/index.php');
    }
}