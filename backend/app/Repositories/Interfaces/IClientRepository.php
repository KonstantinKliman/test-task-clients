<?php

namespace App\Repositories\Interfaces;

interface IClientRepository
{
    public function create(array $data);

    public function list(int $userId, int $limit);

    public function getById(int $clientId);

    public function updateById(int $clientId, array $data);

}
