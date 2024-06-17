<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\IUserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private IUserService $service;

    public function __construct(IUserService $service)
    {
        $this->service = $service;
    }

    public function get(Request $request)
    {
        return response()->json($this->service->getUser($request));
    }
}
