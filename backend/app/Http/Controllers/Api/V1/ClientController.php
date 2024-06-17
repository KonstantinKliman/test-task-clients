<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Client\CreateRequest;
use App\Http\Requests\Api\v1\Client\UpdateStatusRequest;
use App\Services\Interfaces\IClientService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private IClientService $service;

    public function __construct(IClientService $service)
    {
        $this->service = $service;
    }

    public function create(CreateRequest $request)
    {
        return new JsonResponse($this->service->create($request), 201);
    }

    public function list(Request $request)
    {
        return new JsonResponse($this->service->list($request), 200);
    }

    public function updateStatus(UpdateStatusRequest $request, int $clientId)
    {
        return new JsonResponse($this->service->updateStatus($request, $clientId), 200);
    }
}
