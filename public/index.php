<?php

use Slim\Factory\AppFactory;
use App\Routes\ApiRouter;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

// instantiate router class and register routes
$router = new ApiRouter($app);
$router->registerRoutes();

$app->run();
