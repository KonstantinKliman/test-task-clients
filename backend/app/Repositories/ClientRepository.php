<?php

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\Interfaces\IClientRepository;

class ClientRepository implements IClientRepository
{

    public function create(array $data)
    {
        return Client::query()->create($data);
    }

    public function list(int $userId, int $limit)
    {
        return Client::query()->where('user_id', $userId)->limit($limit)->get();
    }

    public function updateById(int $clientId, array $data)
    {
        return Client::query()->where('id', $clientId)->update($data);
    }

    public function getById(int $clientId)
    {
        return Client::query()->where('id', $clientId)->first();
    }
}
