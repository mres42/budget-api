<?php

use DI\Container;
use App\Config\Database;
use App\Module\v1\User\Repository\UserRepository;
use App\Module\v1\User\Service\UserService;
use App\Module\v1\User\Controller\UserController;

$container = new Container();

// PDO instance
$container->set(\PDO::class, function (): \PDO {
    return Database::getInstance()->getConnection();
});

// User Dependencies
$container->set(UserRepository::class, function ($c): UserRepository {
    return new UserRepository($c->get(\PDO::class));
});

$container->set(UserService::class, function ($c): UserService {
    return new UserService($c->get(UserRepository::class));
});

$container->set(UserController::class, function ($c): UserController {
    return new UserController($c->get(UserService::class));
});

return $container;
