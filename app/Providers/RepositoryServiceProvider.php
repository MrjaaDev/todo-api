<?php

namespace App\Providers;

use App\Interfaces\TaskCommandInterface;
use App\Interfaces\TaskQueryInterface;
use App\Interfaces\UserCommandInterface;
use App\Interfaces\UserQueryInterface;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserCommandInterface::class, UserRepository::class);
        $this->app->bind(UserQueryInterface::class, UserRepository::class);

        $this->app->bind(TaskQueryInterface::class, TaskRepository::class);
        $this->app->bind(TaskCommandInterface::class, TaskRepository::class);
    }

    public function boot()
    {
    }
}
