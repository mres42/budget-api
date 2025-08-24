<?php

namespace App\Routes;

use Slim\App;
use App\Module\v1\Users\Controllers\HelloWorldController;
use App\Module\v1\Users\Controllers\UserController;

class ApiRouter
{
    private App $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public function registerRoutes(): void
    {
        // User Routes
        $this->app->get('/users', [UserController::class, 'index']);
    }
}
