<?php

namespace App\Providers;

use App\Http\Repositories\Post\PostEloquentRepository;
use App\Http\Repositories\Post\PostRepositoryInterface;
use App\Http\Repositories\User\UserEloquentRepository;
use App\Http\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(
            PostRepositoryInterface::class,
            PostEloquentRepository::class
        );
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserEloquentRepository::class
        );
    }
}
