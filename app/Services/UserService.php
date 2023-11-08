<?php

namespace App\Services;

use App\Data\UserData;
use App\Data\UserResponseData;
use App\Exceptions\CreateModelException;
use App\Interfaces\UserCommandInterface;
use App\Interfaces\UserQueryInterface;

class UserService
{
    private UserCommandInterface $command;
    private UserQueryInterface $query;

    public function __construct(UserCommandInterface $command, UserQueryInterface $query)
    {
        $this->command = $command;
        $this->query = $query;
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

    /**
     * @throws \Exception
     */
    public function Login(array $data)
    {
        $data = UserData::from($data);
        $user = $this->query->GetByEmail($data->email);
        if (!$user)
            throw new \Exception('',500);
        $token = $this->command->CreateToken($user);
        return new UserResponseData($user, $token);
    }
}
