<?php

namespace App\Repositories;

use App\Interfaces\UserCommandInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;

class UserRepository extends Repository implements UserCommandInterface
{

    function model(): Model
    {
        return new User();
    }

    public function CreateUser(Data $data)
    {
        return $this->Create($data->toArray());
    }

    public function CreateToken(User $user)
    {
        return $user->createToken($user->name);
    }
}
