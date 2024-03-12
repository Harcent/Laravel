<?php

namespace App\Providers;

use App\Repositories\ToDoEloquentORM;
use App\Repositories\ToDoRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            ToDoRepositoryInterface::class,
            ToDoEloquentORM::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
