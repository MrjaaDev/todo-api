<?php

namespace App\Interfaces;

interface UserQueryInterface
{
    public function GetByEmail(string $email);
}
