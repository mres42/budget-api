<?php

namespace App\Module\v1\Users\Services;

use App\Module\v1\Users\Repository\UserRepository;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function listAllUsers(): array
    {
        return $this->userRepository->list();
    }
}
