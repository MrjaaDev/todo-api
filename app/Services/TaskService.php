<?php

namespace App\Services;

use App\Data\TaskData;
use App\Interfaces\TaskCommandInterface;
use App\Interfaces\TaskQueryInterface;
use App\Models\User;

class TaskService
{
    private TaskQueryInterface $query;
    private TaskCommandInterface $command;

    public function __construct(TaskQueryInterface $query, TaskCommandInterface $command)
    {
        $this->query = $query;
        $this->command = $command;
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

    public function AddTask(array $task)
    {
        return $this->command->CreateTask(TaskData::from($task)->toArray());
    }

    public function ToggleDoneTask(int $id)
    {
        return $this->command->ToggleDoneTask($id);
    }

    public function DeleteTask(int $id)
    {
        return $this->command->DeleteTask($id);
    }
}
