<?php


namespace App\Services;


use App\Contracts\Repository\UserRepositoryContract;
use App\Contracts\Services\UserServiceContract;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserService implements UserServiceContract
{
    private $repository;
    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function registerProcess($request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        $user = $this->repository->registerUser($data);

        if (!$user || !Hash::check($data['password'], $user->password)){
            return getFormattedResponseData([], 'Wrong credential', false, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $token = $user->createToken('myAppToken')->plainTextToken;
        $responce = [
            'user' => $user,
            'token' => $token
        ];
        return getFormattedResponseData($responce, 'Login successfully', true, Response::HTTP_OK);
    }

    public function loginProcess($request)
    {

        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = $this->repository->getUserByEmail($data['email']);


        $token = $user->createToken('myAppToken')->plainTextToken;
        $responce = [
            'user' => $user,
            'token' => $token
        ];
        if ($user){
            return getFormattedResponseData($responce, 'User created successfully', true, Response::HTTP_CREATED);
        }
        return getFormattedResponseData([], 'Something went wrong', false, Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function logout($request)
    {
        $authLogout = auth()->user()->tokens()->delete();

        if ($authLogout){
            return getFormattedResponseData([], 'Logout successfully', true, Response::HTTP_CREATED);
        }
        return getFormattedResponseData([], 'Something went wrong', false, Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
