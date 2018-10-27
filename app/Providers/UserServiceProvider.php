<?php

namespace App\Providers;

use App\Contracts\UserContract;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserContract::class, function($app){
            return new UserRepository($app->make(User::class));
        });
    }
}
