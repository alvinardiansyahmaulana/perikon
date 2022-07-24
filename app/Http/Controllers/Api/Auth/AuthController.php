<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRegisterRequest;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Services\User\UserService;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $service)
    {
        $this->userService = $service;
    }

    public function register(UserRegisterRequest $request): Response
    {
        $data = $this->userService->create($request->validated());
        
        return $data['token'] ? responseSuccess($data) : responseError($data);
    }

    public function login(UserLoginRequest $request): Response
    {
        if (!auth()->attempt($request->validated())) {

            return responseError('Incorrect Detail, please try again');
        }

        return responseSuccess([
            'user' => auth()->user(),
            'token' => getUserAccessToken()
        ]);
    }
 }
