<?php

namespace App\Module\V1\Users\Controllers;

use App\Module\v1\Users\Services\UserService;
use Slim\Psr7\Response;
use Slim\Psr7\Request;

class UserController
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request, Response $response, array $args): Response
    {
        $users = $this->userService->listAllUsers();
        $payload = json_encode($users);

        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
    }
}
