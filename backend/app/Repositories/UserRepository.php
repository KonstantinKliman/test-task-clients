<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;

class UserRepository implements IUserRepository
{

    public function create(array $data)
    {
        return User::query()->create($data);
    }

    public function getByLogin(string $login)
    {
        return User::query()->where('login', $login)->first();
    }
}
