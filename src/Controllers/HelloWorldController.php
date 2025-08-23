<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Resquest;
use Slim\Psr7\Request;

class HelloWorldController
{
    public function hello(Request $request, Response $response): Response
    {
        $response->getBody()->write("Hello, World!");
        return $response;
    }
}
