<?php

namespace App\Services;

use App\Data\UserData;
use App\Exceptions\CreateModelException;
use App\Interfaces\UserCommandInterface;

class UserService
{
    private UserCommandInterface $command;

    public function __construct(UserCommandInterface $command)
    {
        $this->command = $command;
    }

    /**
     * @throws CreateModelException
     */
    public function Register(array $data)
    {
        $user = $this->command->CreateUser(UserData::from($data));
        if (!$user)
            throw new CreateModelException("User does not registered!");
        return $this->command->CreateToken($user);
    }
}
