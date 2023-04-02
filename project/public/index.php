<?php

namespace App;

use App\Controller\MainPageController;
use App\Controller\UserController;
use App\Service\Application;

require_once $autoloadPath1 = __DIR__ . '/../vendor/autoload.php';

$app = new Application();

$app->get('/', [MainPageController::class, 'index']);

$app->get('/users', [UserController::class, 'index']);

$app->get('/users/{id}', [UserController::class, 'show']);

$app->post('/users/{id}', [UserController::class, 'create']);

$app->run();