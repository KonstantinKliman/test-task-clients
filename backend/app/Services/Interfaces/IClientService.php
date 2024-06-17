<?php

namespace App\Services\Interfaces;

use App\Http\Requests\Api\v1\Client\CreateRequest;
use App\Http\Requests\Api\v1\Client\UpdateStatusRequest;
use Illuminate\Http\Request;

interface IClientService
{
    public function create(CreateRequest $request);

    public function list(Request $request);

    public function updateStatus(UpdateStatusRequest $request, int $clientId);
}
