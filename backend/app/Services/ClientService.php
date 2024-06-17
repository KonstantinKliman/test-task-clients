<?php

namespace App\Services;

use App\Enums\StatusType;
use App\Http\Requests\Api\v1\Client\CreateRequest;
use App\Http\Requests\Api\v1\Client\UpdateStatusRequest;
use App\Http\Resources\ClientResource;
use App\Repositories\Interfaces\IClientRepository;
use App\Services\Interfaces\IClientService;
use Illuminate\Http\Request;

class ClientService implements IClientService
{
    private IClientRepository $repository;

    public function __construct(IClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(CreateRequest $request): ClientResource
    {
        $data = [
            'user_id' => $request->user()->id,
            'first_name' => $request->validated('firstName'),
            'middle_name' => $request->validated('middleName'),
            'last_name' => $request->validated('lastName'),
            'date_of_birth' => $request->validated('dateOfBirth'),
            'inn' => $request->validated('inn'),
            'status_id' => StatusType::NotInWork->value
        ];

        $client = $this->repository->create($data);

        return new ClientResource($client);
    }

    public function list(Request $request)
    {
        $userId = $request->user()->id;

        $clients = $this->repository->list($userId, 20);

        return ClientResource::collection($clients);
    }

    public function updateStatus(UpdateStatusRequest $request, int $clientId)
    {
        $data = [
            'status_id' => $request->validated('statusId')
        ];

        $this->repository->updateById($clientId, $data);

        $client = $this->repository->getById($clientId);

        return new ClientResource($client);
    }
}
