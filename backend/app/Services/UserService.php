<?php

namespace App\Services;

use App\Exceptions\InvalidUserLoginException;
use App\Exceptions\InvalidUserPasswordException;
use App\Http\Requests\Api\v1\LoginRequest;
use App\Http\Requests\Api\v1\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Repositories\Interfaces\IUserRepository;
use App\Services\Interfaces\IUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService implements IUserService
{
    private IUserRepository $repository;

    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function register(RegisterRequest $request): UserResource
    {
        $data = [
            'full_name' => $request->validated('fullName'),
            'login' => $request->validated('login'),
            'password' => Hash::make($request->validated('password'))
        ];

        $user = $this->repository->create($data);

        return new UserResource($user);
    }

    public function login(LoginRequest $request)
    {
        $data = [
            'login' => $request->validated('login'),
            'password' => $request->validated('password'),
        ];

        $user = $this->repository->getByLogin($data['login']);

        if (!$user) {
            throw new InvalidUserLoginException();
        }

        if (!Hash::check($data['password'], $user->password)) {
            throw new InvalidUserPasswordException();
        }

        return [
            'token' => $user->createToken('api-token')->plainTextToken,
            'tokenType' => 'bearer'
        ];
    }


    public function getUser(Request $request)
    {
        return new UserResource($request->user());
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }
}
