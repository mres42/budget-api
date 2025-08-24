<?php

use Slim\Factory\AppFactory;
use App\Routes\ApiRouter;
use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// DI Container
$container = require __DIR__ . '/../src/Config/container.php';
AppFactory::setContainer($container);

$app = AppFactory::create();

// instantiate router class and register routes
$router = new ApiRouter($app);
$router->registerRoutes();

$app->run();
