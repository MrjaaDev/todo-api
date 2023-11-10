<?php

namespace App\Repositories;

use App\Interfaces\TaskQueryInterface;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class TaskRepository extends Repository implements TaskQueryInterface
{

    function model(): Model
    {
        return new Task();
    }

    public function GetAllTasks(): array
    {
        return $this->query()->get()->toArray();
    }

    public function GetTask(int $id)
    {
        return $this->Get($id);
    }

    public function GetUserTasks(User $user)
    {
        return $user->tasks;
    }
}
