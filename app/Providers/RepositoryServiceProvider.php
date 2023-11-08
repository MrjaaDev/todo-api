<?php

namespace App\Providers;

use App\Interfaces\UserCommandInterface;
use App\Interfaces\UserQueryInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserCommandInterface::class, UserRepository::class);
        $this->app->bind(UserQueryInterface::class, UserRepository::class);
    }

    public function boot()
    {
    }
}
