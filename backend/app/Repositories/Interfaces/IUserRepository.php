<?php

namespace App\Repositories\Interfaces;

interface IUserRepository
{
    public function create(array $data);

    public function getByLogin(string $login);
}
