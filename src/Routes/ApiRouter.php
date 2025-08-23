<?php

namespace App\Routes;

use Slim\App;
use App\Controllers\HelloWorldController;

class ApiRouter
{
    private App $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public function registerRoutes(): void
    {
        $helloController = new HelloWorldController();

        $this->app->get('/hello', [$helloController, 'hello']);
    }
}
