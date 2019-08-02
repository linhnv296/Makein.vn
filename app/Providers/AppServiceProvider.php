<?php

namespace App\Providers;

use App\Repositories\Impl\PostRepositoryImpl;
use App\Repositories\PostRepository;
use App\Services\Impl\PostServiceImpl;
use App\Services\PostService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PostService::class, PostServiceImpl::class);
        $this->app->singleton(PostRepository::class, PostRepositoryImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
