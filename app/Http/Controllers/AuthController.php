<?php

namespace App\Http\Controllers;

use App\Contracts\Services\UserServiceContract;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class AuthController extends BaseController
{
    private $service;
    public function __construct(UserServiceContract $service)
    {
        $this->service = $service;
    }

    public function register(UserRequest $request)
    {
        return $this->returnApiResponse($this->service->registerProcess($request));
    }

    public function login(Request $request)
    {
        return $this->returnApiResponse($this->service->loginProcess($request));
    }

    public function logout(Request $request)
    {
        return $this->returnApiResponse($this->service->logout($request));
    }
}
