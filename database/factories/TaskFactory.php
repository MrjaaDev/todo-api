<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'done' => $this->faker->boolean(),
            'user_id' => User::each(function (User $user){
                return $user->id;
            }, User::count()),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
