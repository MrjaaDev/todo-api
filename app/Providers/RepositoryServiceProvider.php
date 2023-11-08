<?php

namespace App\Providers;

use App\Interfaces\UserCommandInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserCommandInterface::class, UserRepository::class);
    }

    public function boot()
    {
    }
}
