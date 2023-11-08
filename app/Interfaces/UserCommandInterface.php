<?php

namespace App\Interfaces;

use App\Models\User;
use Spatie\LaravelData\Data;

interface UserCommandInterface
{
    public function CreateUser(Data $data);

    public function CreateToken(User $user);
}
