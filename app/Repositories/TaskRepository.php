<?php

namespace App\Repositories;

use App\Interfaces\TaskCommandInterface;
use App\Interfaces\TaskQueryInterface;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class TaskRepository extends Repository implements TaskQueryInterface, TaskCommandInterface
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

    public function CreateTask(array $data)
    {
        return $this->Create($data);
    }

    public function ToggleDoneTask(int $id)
    {
        try {
            $task = $this->Get($id);
            $task->update(['done' => !$task->done]);
            DB::commit();
            return true;
        } catch (QueryException $queryException) {
            report($queryException);
            DB::rollBack();
            return false;
        } catch (Exception $exception) {
            report($exception);
            DB::rollBack();
            return null;
        }
    }

    public function DeleteTask(int $id)
    {
        return $this->Delete($id);
    }
}
