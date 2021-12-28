<?php


namespace App\Contracts\Services;


interface UserServiceContract
{
    public function registerProcess($request);

    public function loginProcess($request);

    public function logout($request);
}
