<?php

namespace App\Routes;

use Slim\App;
use App\Module\v1\User\Controller\UserController;
use App\Module\v1\User\Controller\LoginController;

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
        $this->app->post('/login', [LoginController::class, 'authenticate']);
        $this->app->post('/logout', [LoginController::class, 'logout']);

        $this->app->get('/users', [UserController::class, 'index']);
    }
}
