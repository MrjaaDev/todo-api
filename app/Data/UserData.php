<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        #[MapInputName('name')]
        public string $username,
        public string $email,
        public string $password
    )
    {
    }
}
