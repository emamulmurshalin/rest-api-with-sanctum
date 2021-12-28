<?php


namespace App\Repository;


use App\Contracts\Repository\UserRepositoryContract;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryContract
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function registerUser($data)
    {
        return $this->model->create($data);
    }

    public function getUserByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }
}
