<?php

namespace App\Module\v1\users\Repository\RepositoryInterfaces;

interface UserRepositoryInterface
{
    public function list(): array;
}
