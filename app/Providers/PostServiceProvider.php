<?php

namespace App\Providers;

use App\Contracts\PostContract;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
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
        $this->app->singleton(PostContract::class, function($app){
            return new PostRepository($app->make(Post::class));
        });
    }
}
