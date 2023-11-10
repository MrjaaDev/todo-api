<?php

namespace App\Repositories;

use App\Interfaces\UserCommandInterface;
use App\Interfaces\UserQueryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;

class UserRepository extends Repository implements UserCommandInterface, UserQueryInterface
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

    public function GetByEmail(string $email)
    {
        return $this->query()->where('email', $email)->first();
    }
}
