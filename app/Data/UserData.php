<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserData extends Data
{
    private string $password;

    public function __construct(
        public string|Optional $name,
        public string          $email,
        string          $password
    )
    {
        $this->password = \Hash::make($password);
    }
}
