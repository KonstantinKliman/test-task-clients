<?php

namespace App\Services\Interfaces;

use App\Http\Requests\Api\v1\LoginRequest;
use App\Http\Requests\Api\v1\RegisterRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

interface IUserService
{
    public function register(RegisterRequest $request): UserResource;

    public function login(LoginRequest $request);

    public function getUser(Request $request);

    public function logout(Request $request);
}
