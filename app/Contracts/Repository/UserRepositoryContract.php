<?php


namespace App\Contracts\Repository;


interface UserRepositoryContract
{
    public function registerUser($data);

    public function getUserByEmail($email);
}
