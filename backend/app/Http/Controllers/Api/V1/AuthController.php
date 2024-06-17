<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\LoginRequest;
use App\Http\Requests\Api\v1\RegisterRequest;
use App\Services\Interfaces\IUserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private IUserService $service;

    public function __construct(IUserService $service)
    {
        $this->service = $service;
    }

    public function register(RegisterRequest $request)
    {
        return response()->json($this->service->register($request), 201);
    }

    public function login(LoginRequest $request)
    {
        return response()->json($this->service->login($request));
    }

    public function logout(Request $request)
    {
        return response()->json($this->service->logout($request), 200);
    }
}
