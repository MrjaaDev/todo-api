<?php

namespace App\Interfaces;

use App\Models\User;

interface TaskQueryInterface
{
    public function GetAllTasks();

    public function GetTask(int $id);

    public function GetUserTasks(User $user);

}
