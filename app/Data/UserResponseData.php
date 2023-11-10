<?php

namespace App\Data;

use App\Models\User;
use Laravel\Sanctum\NewAccessToken;
use Spatie\LaravelData\Data;

class UserResponseData extends Data
{
    public function __construct(
        public User           $user,
        public NewAccessToken $token
    )
    {
    }
}
