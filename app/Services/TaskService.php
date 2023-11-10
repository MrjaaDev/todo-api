<?php

namespace App\Services;

use App\Interfaces\TaskQueryInterface;
use App\Models\User;

class TaskService
{
    private TaskQueryInterface $query;

    public function __construct(TaskQueryInterface $query)
    {
        $this->query = $query;
    }

    public function GetAll()
    {
        return $this->query->GetAllTasks();
    }

    public function Get(int $id)
    {
        return $this->query->GetTask($id);
    }

    public function GetTaskByUser(User $user)
    {
        return $this->query->GetUserTasks($user);
    }
}
