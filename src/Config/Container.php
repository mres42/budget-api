<?php
// src/Config/container.php

use DI\Container;
use App\Config\Database;
use App\Module\v1\Users\Repository\UserRepository;
use App\Module\v1\Users\Services\UserService;
use App\Module\v1\Users\Controllers\UserController;

$container = new Container();

// PDO instance
$container->set(\PDO::class, function () {
    return Database::getInstance()->getConnection();
});

// user Dependencies
$container->set(UserRepository::class, function ($c) {
    return new UserRepository($c->get(\PDO::class));
});

$container->set(UserService::class, function ($c) {
    return new UserService($c->get(UserRepository::class));
});

$container->set(UserController::class, function ($c) {
    return new UserController($c->get(UserService::class));
});

return $container;
