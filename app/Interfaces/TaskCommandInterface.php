<?php

namespace App\Interfaces;

interface TaskCommandInterface
{
    public function CreateTask(array $data);

    public function ToggleDoneTask(int $id);
    public function DeleteTask(int $id);
}
